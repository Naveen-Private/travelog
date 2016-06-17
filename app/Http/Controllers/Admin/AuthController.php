<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Points;
use App\Mailers\AppMailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;


class AuthController extends Controller {

   
    public function getDashboard()
    {
        return view('admin.dashboard');
    }


    /**
     * Get the login view.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLogin() {
        return view('admin.login');
    }
    
    


    /**
     * Login in the user.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postLogin(Request $request) {

        
        // Validate email and password.
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required|'
        ]);

        // login in user if successful
        if ($this->signIn($request)) {
            flash()->success('Success', 'You have successfully signed in.');
            return redirect()->route('dashboard');
        }

        // Else, show error message, and redirect them back to login.php.
        flash()->customErrorOverlay('Error', 'Could not sign you in with those credentials');

        return redirect()->route('admin-login');
         
    }
    
    /**
     * Attempt to sign in the user.
     *
     * @param  Request $request
     * @return boolean
     */
    protected function signIn(Request $request) {
        return Auth::attempt($this->getCredentials($request), $request->has('remember'));
    }


    /**
     * Get the user credentials to login.
     *
     * @param Request $request
     * @return array
     */
    protected function getCredentials(Request $request) {
        return [
            'email'    => $request->input('email'),
            'password' => $request->input('password'),
            'role_type' => 'admin'
        ];
    }



    /**
     * Logout user.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout() {
        Auth::logout();
        return redirect()->route('admin-login');
    }

}