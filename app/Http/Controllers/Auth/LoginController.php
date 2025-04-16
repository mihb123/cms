<?php

namespace App\Http\Controllers\Auth;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function credentials(Request $request)
    {      
        $credentials = $request->only('email', 'password');

        $credentials['status'] = Admin::STATUS_ACTIVE;
        return $credentials;
    }

    protected function logout(Request $request) {
        auth()->logout();
        return redirect(config('backend.route'));
    }
}
