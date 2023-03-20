<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * @return View
     */
    public function index():View
    {
        return view('pages.dashboard.authentication.login');
    }

    /**
     * @param LoginUserRequest $request
     * @return View
     */
    public function login(LoginUserRequest $request): View
    {

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

            return
                view('pages.dashboard.sendEmail');
        }
         return view('pages.dashboard.authentication.login');
    }

    /**
     * Log out account user.
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function logout():Redirect
    {
        Session::flush();
        Auth::logout();
        return redirect('Dashboards/login');
    }

}
