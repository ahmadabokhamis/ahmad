<?php

namespace App\Http\Controllers\Auth\company;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyLoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('company-auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(CompanyLoginRequest $request): RedirectResponse
    {
        $request->authenticate('company');

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOMECOMPANY);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('company')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('company.login');
    }
}
