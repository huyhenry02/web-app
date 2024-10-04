<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class CreatorController extends Controller
{
    public function show_blacklist(): View|Factory|Application
    {
        return view('admin.creator.blacklist');
    }

    public function show_list(): View|Factory|Application
    {
        return view('admin.creator.list');
    }
}
