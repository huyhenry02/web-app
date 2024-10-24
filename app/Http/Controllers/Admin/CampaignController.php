<?php

namespace App\Http\Controllers\Admin;

use App\Models\ApprovalHistory;
use App\Models\CampaignRegistration;
use Exception;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class CampaignController extends Controller
{
    public function show_list(): View|Factory|Application
    {
        $campaigns = Campaign::all();
        return view('admin.campaign.list', ['campaigns' => $campaigns]);
    }

    public function show_request(): View|Factory|Application
    {
        $approvalHistories = ApprovalHistory::all();
        return view('admin.campaign.request',
            [
                'approvalHistories' => $approvalHistories
            ]);
    }

    public function show_create(): View|Factory|Application
    {
        return view('admin.campaign.create');
    }

    public function show_detail(Campaign $model): View|Factory|Application
    {
        $campaignRegistrations = $model->campaignRegistrations;
        $approvalHistories = $model->approvalHistories()->orderBy('created_at', 'desc')->get();
        return view('admin.campaign.detail', [
            'campaign' => $model,
            'campaignRegistrations' => $campaignRegistrations,
            'approvalHistories' => $approvalHistories,
        ]);
    }

    public function show_update(Campaign $model): View|Factory|Application
    {
        return view('admin.campaign.update', ['campaign' => $model]);
    }

    public function create(Request $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $input['created_by_id'] = auth()->id();
            $input['blacklist_excluded'] = $request->has('blacklist_excluded') ? 1 : 0;
            if ($request->hasFile('file')) {
                $input['banner'] = $this->handleUploadImage($request->file('file'));
            }
            $campaign = new Campaign();
            $campaign->fill($input);
            $campaign->save();

            $campaign->code = 'CD' . str_pad($campaign->id, 3, '0', STR_PAD_LEFT);
            $campaign->save();

            DB::commit();
            return redirect()->route('admin.campaign.list');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function delete(Campaign $model): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $model->delete();
            $model->file()->delete();
            DB::commit();
            return redirect()->route('admin.campaign.list');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function update(Campaign $model, Request $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $input['updated_by_id'] = auth()->id();
            $input['blacklist_excluded'] = $request->has('blacklist_excluded') ? 1 : 0;
            if ($request->hasFile('file')) {
                $input['banner'] = $this->handleUploadImage($request->file('file'));
            }
            $model->fill($input);
            $model->save();
            DB::commit();
            return redirect()->route('admin.campaign.list');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function handleUploadImage($request): string
    {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = $image->storePubliclyAs('images/banners', $imageName);
        return asset('storage/' . $imagePath);
    }


    public function actionRequestJoin(Request $request, ApprovalHistory $model): RedirectResponse
    {
        try {
            $input = $request->all();
            if ($input['action'] === ApprovalHistory::ACTION_REJECTED) {
                $model->status = ApprovalHistory::ACTION_REJECTED;
                $model->save();
                return redirect()->route('admin.campaign.request')->with('success', 'Request has been REJECTED');
            }
            $model->action = ApprovalHistory::ACTION_APPROVED;
            $model->save();

            $inputCampaignRegistration['campaign_id'] = $model->campaign_id;
            $inputCampaignRegistration['creator_id'] = $model->creator_id;
            $campaignRegistration = new CampaignRegistration();
            $campaignRegistration->fill($inputCampaignRegistration);
            $campaignRegistration->save();

            return redirect()->route('admin.campaign.request')->with('success', 'Request has been ACCEPTED');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
