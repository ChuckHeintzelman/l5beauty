<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $auth;

    /**
     * Create a new authentication controller instance.
     *
     * @param  Guard  $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;

        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Show the login form.
     *
     * @return Response
     */
    public function getLogin()
    {
        return view('auth.login');
    }

    /**
     * Handle a login request.
     *
     * @param  Request  $request
     * @return Response
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email', 'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if ($this->auth->attempt($credentials, $request->has('remember'))) {
            return redirect()->intended('/auth/login');
        }

        return redirect('/auth/login')
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => 'Invalid credentials.',
            ]);
    }

    /**
     * Log the user out of the application.
     *
     * @return Response
     */
    public function getLogout()
    {
        $this->auth->logout();

        return redirect('/auth/login');
    }
}