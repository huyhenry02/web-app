<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
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

    public function postLogin(Request $request): RedirectResponse
    {
        try {
            $credentials = $request->only('email', 'password');
            if (auth()->attempt($credentials)) {
                return redirect()->route('admin.campaign.list');
            }
            return redirect()->back();
        }catch (Exception $e) {
            return redirect()->route('show_login')->with('error', $e->getMessage());
        }
    }

    public function postLogout(): RedirectResponse
    {
        auth()->logout();
        return redirect()->route('show_login');
    }
}
