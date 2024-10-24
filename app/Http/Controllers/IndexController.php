<?php

namespace App\Http\Controllers;

use App\Models\ApprovalHistory;
use Exception;
use App\Models\User;
use App\Models\Creator;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class IndexController extends Controller
{
    public function showIndex(): View|Factory|Application
    {
        return view('customer.index');
    }

    public function showDetailCampaign(Campaign $model): View|Factory|Application
    {
        return view('customer.detail-campaign',
            [
                'model' => $model
            ]);
    }

    public function showListCampaign(): View|Factory|Application
    {
        $campaigns = Campaign::where('status', Campaign::STATUS_ACTIVE)->get();
        return view('customer.list-campaign',
            [
                'campaigns' => $campaigns
            ]);
    }

    public function showLogin(): View|Factory|Application
    {
        return view('customer.login');
    }

    public function showRegister(): View|Factory|Application
    {
        return view('customer.register');
    }

    public function showYourCampaign(): View|Factory|Application
    {
        return view('customer.your-campaign');
    }

    public function showRequestCampaign(): View|Factory|Application
    {
        $approvalHistories = ApprovalHistory::where('creator_id', auth()->user()->id)->get();
        return view('customer.request-campaign',
        [
            'approvalHistories' => $approvalHistories
        ]);
    }

    public function postRegister(Request $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $input['user_type'] = 'creator';
            $input['is_active'] = 1;
            $input['password'] = bcrypt($input['password']);
            $user = new User();
            $user->fill($input);
            $user->save();

            $input['user_id'] = $user->id;
            $creator = new Creator();
            $creator->fill($input);
            $creator->save();

            DB::commit();
            return redirect()->route('show_login')->with('success', 'Register successfully');
        }catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('show_register')->with('error', $e->getMessage());
        }
    }

    public function sendRequestJoin(Request $request): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $input = $request->all();
            $input['creator_id'] = auth()->user()->id;
            $input['admin_id'] = 1;
            $input['status'] = Campaign::STATUS_PENDING;
            $approvalHistory = new ApprovalHistory();
            $approvalHistory->fill($input);
            $approvalHistory->save();
            DB::commit();
            return redirect()->route('creator.showRequestCampaign')->with('success', 'Request successfully');
        }catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
