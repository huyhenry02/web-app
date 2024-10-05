<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Support\Facades\File;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;
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
        return view('admin.campaign.request');
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
            $campaign = new Campaign();
            $campaign->fill($input);
            $campaign->save();

            $campaign->code = 'CD' . str_pad($campaign->id, 3, '0', STR_PAD_LEFT);
            $campaign->save();

            if ($request->hasFile('file')) {
                $this->handleFileUpload($request->file('file'), $campaign);
            }
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
            $input['created_by_id'] = auth()->id();
            $input['blacklist_excluded'] = $request->has('blacklist_excluded') ? 1 : 0;
            $model->fill($input);
            $model->save();
            if ($request->hasFile('file')) {
                $model->file()->delete();
                $this->handleFileUpload($request->file('file'), $model);
            }
            DB::commit();
            return redirect()->route('admin.campaign.list');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    private function handleFileUpload($file, $campaign): void
    {
        $image = Image::read($file);

        $timestamp = time();
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $imageName = 'banner_campaign_' . $timestamp . '_' . $originalName . '.' . $extension;

        $destinationPath = public_path('files/');
        $destinationPathThumbnail = public_path('files/campaign/');

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }
        if (!File::exists($destinationPathThumbnail)) {
            File::makeDirectory($destinationPathThumbnail, 0755, true);
        }

        $image->save($destinationPath . $imageName);

        $image->resize(650, 366);
        $image->save($destinationPathThumbnail . $imageName);

        $fileData = new \App\Models\File();
        $fileData->fileable_type = Campaign::class;
        $fileData->fileable_id = $campaign->id;
        $fileData->file_path = 'files/' . $imageName;
        $fileData->file_name = $imageName;
        $fileData->file_size = $file->getSize();
        $fileData->mime_type = $file->getMimeType();
        $fileData->uploaded_by_id = auth()->id();
        $fileData->save();
    }
}
