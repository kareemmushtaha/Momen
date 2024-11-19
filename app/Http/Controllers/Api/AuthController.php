<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\imageItem;
use App\User;
use Validator;
use Set;
use Up;
use Form;
use Illuminate\Support\Facades\Auth;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class AuthController extends Controller
{
    public function Login(Request $request)
    {

        
        $data = $this->validate(request(), [
            'phone' => 'required|regex:/[0-9]{10}/|digits:10',
         ], [], [
            'phone' => trans('admin.phone'),
         ]);
        $user = User::where('phone', $request->get('phone'))->first();
        if ($user != null) {
            // Send SMS
             $randomCode = $this->generatePIN();
             $message = "Activation code is: " . $randomCode;
             $phone = (int) request()->phone;
             $user->activation_code = $randomCode;
             $user->save();
             if ($this->startsWith($phone, '5')) {
                 $this->sendSMS("966" . $phone, $message);
             }

            session()->flash('success', 'تم ارسال كود هاتفك');
            $phone = $user->phone;
            return redirect()->route('otp')->with( ['phone' => $phone] );

            // return view('website.otp' , compact('phone'));
        } else {

            // session()->flash('error', 'تحقق من رقم الهاتف ');
            session()->flash('success', 'استكمل بيانات لاتمام عملية التسجيل');
            $phone = request()->phone;
            return redirect()->route('login_name')->with( ['phone' => $phone] );
            // return redirect()->back();
        }
    }
    public function otp(Request $request)
    {
        $data = $this->validate(request(), [
            'phone' => 'required|regex:/[0-9]{10}/|digits:10',
         ], [], [
            'phone' => trans('admin.phone'),
         ]);
         $data_array = request()->all();
         $code1 = (int)request()->code1;
         $code2 = (int)request()->code2;
         $code3 = (int)request()->code3;
         $code4 = (int)request()->code4;

         $allcode = $code1 . $code2 .$code3 .$code4 ;
         $code =  (int)$allcode;

         $user = User::where('phone', $request->get('phone'))->first();
        if ($user != null) {
            if($user->activation_code != $code){
                session()->flash('error',trans('admin.activation-code-error'));
                return redirect()->back()->with( ['phone' => $request->get('phone')] );
            } else {
                Auth::login($user);
                return redirect('/myprofile');
            }
        } else {
            session()->flash('error', 'تحقق من رقم الهاتف ');
            return redirect()->back()->with( ['phone' => $request->get('phone')] );
        }


    }

    public function login_name()
    {
        return view('website.name');

    }
    public function register()
    {
        $data = $this->validate(request(), [
            'phone' => 'required|regex:/[0-9]{10}/|digits:10|unique:users',
            'name' => 'required',
         ], [], [
            'phone' => trans('admin.phone'),
            'name' => trans('admin.name'),
         ]);

         // Send SMS
        $randomCode = $this->generatePIN();
        $message = "Activation code is: " . $randomCode;
        $phone = (int) request()->phone;
        if ($this->startsWith($phone, '5')) {
            $this->sendSMS("966" . $phone, $message);
        }


        $user = new User();
        $user->name = request('name');
        $user->phone      = request('phone');
        $user->activation_code      = $randomCode;
        $user->save();
        session()->flash('success', 'تم التسجيل بنحاح');
        return redirect()->route('otp')->with( ['phone' => request()->phone] );

    }
    function sendSMS($mobileNumber , $messageContent)
    {
        $user = "";
        $password = "";
        $sendername = "";

        $text = urlencode( $messageContent);
        $to = $mobileNumber;
        // auth call
        $url = "http://www.oursms.net/api/sendsms.php?username=$user&password=$password&numbers=$to&message=$text&sender=$sendername&unicode=E&return=json";


        $ret = file_get_contents($url);
        echo nl2br($ret);
    }

    public function startsWith($string, $startString)
    {
        $len = strlen($startString);
        return (substr($string, 0, $len) === $startString);
    }
    function generatePIN($digits = 4){
        $i = 0; //counter
        $pin = ""; //our default pin is blank.
        while($i < $digits){
            //generate a random number between 0 and 9.
            $pin .= mt_rand(0, 9);
            $i++;
        }
        return (int)$pin;
    }

//If I want a 4-digit PIN code.
}
