<?php 
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
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
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        
        $request->authenticate();

        $request->session()->regenerate();

        //return redirect()->intended($this->redirectTo())->with('success', 'logged in succesefully');
        return redirect()->intended($this->redirectTo())->with('flashMessage', ['message' => 'logged in successfully', 'type' => 'success']);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        
        /* return redirect('/')->with('success', 'logged out succesefully');; */
        return redirect('/')->with('flashMessage', ['message' => 'logged out successfully', 'type' => 'success']);
    }

    /**
     * Get the post-login redirect path for the given user.
     */
    protected function redirectTo(): string
    {
        $role = Auth::user()->role->name;
        //dd($role->name);
        if ($role == 'admin') {
            return route('dashboard');
        } elseif ($role == 'SuperAdmin') {
            return route('dashboard');
        } elseif ($role == 'user') {
            return route('dashboard');
        } /* else {
            return RouteServiceProvider::HOME;
        } */
    }
}
