<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class CampaignController extends Controller
{
    public function show_list(): View|Factory|Application
    {
        return view('admin.campaign.list');
    }

    public function show_request(): View|Factory|Application
    {
        return view('admin.campaign.request');
    }

    public function show_create(): View|Factory|Application
    {
        return view('admin.campaign.create');
    }

    public function show_detail(): View|Factory|Application
    {
        return view('admin.campaign.detail');
    }

    public function show_update(): View|Factory|Application
    {
        return view('admin.campaign.update');
    }

}
