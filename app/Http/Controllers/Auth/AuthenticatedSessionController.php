<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
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
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
public function store(Request $request)
{
    $request->validate([
        'email' => ['required', 'string', 'email'],
        'password' => ['required', 'string'],
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials, $request->boolean('remember'))) {
        $request->session()->regenerate();

        $user = Auth::user();

        // Redirect berdasarkan role
        return $this->authenticated($request, $user);
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ])->onlyInput('email');
}

/**
 * Handle post-authentication redirect based on role.
 */
protected function authenticated(Request $request, $user)
{
    switch ($user->role) {
        case 'admin':
            return redirect()->intended('/admin/dashboard');
        
        case 'teknisi':
            return redirect()->intended('/teknisi/dashboard');
        
        case 'pimpinan':
            return redirect()->intended('/pimpinan/dashboard');
        
        default:
            return redirect()->intended('/dashboard');
    }
}
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
