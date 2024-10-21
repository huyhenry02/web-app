<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
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
        return view('customer.request-campaign');
    }
}
