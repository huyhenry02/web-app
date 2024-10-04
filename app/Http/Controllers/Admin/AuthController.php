<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class AuthController extends Controller
{
    public function show_login(): View|Factory|Application
    {
        return view('admin.auth.login');
    }

    public function show_register(): View|Factory|Application
    {
        return view('admin.auth.register');
    }
}
