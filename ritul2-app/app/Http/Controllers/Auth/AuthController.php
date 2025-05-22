<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['email' => 'Invalid login credentials.']);
    }

    public function showCampaignOwnerLogin()
    {
        return view('auth.campaign_owner_login');
    }

    public function campaignOwnerLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials) && Auth::user()->role === 'campaign_owner') {
            return redirect()->route('campaigns.create');
        }

        return back()->withErrors(['email' => 'Invalid login credentials or insufficient permissions.']);
    }

    public function showAdminLogin()
    {
        return view('auth.admin_login');
    }

    public function adminLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials) && Auth::user()->role === 'admin') {
            return redirect()->route('campaigns.index');
        }

        return back()->withErrors(['email' => 'Invalid login credentials or insufficient permissions.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}





