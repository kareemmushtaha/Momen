<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\VerifyUser;
use App\Mail\VerifyMail;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers ;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/myprofile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function authenticated(Request $request, $user)
    {
        if ($user->verified == 0) {
        \Mail::to(auth()->user()->email)->send(new VerifyMail(auth()->user()));

            auth()->logout();
            session()->flash('error', 'تحتاج إلى تأكيد حسابك. لقد أرسلنا لك رمز التفعيل ، يرجى التحقق من بريدك الإلكتروني.');
            return back();
        }
        return redirect()->intended($this->redirectPath());
    }
}
