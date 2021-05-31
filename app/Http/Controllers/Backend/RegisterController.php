<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\User;

class RegisterController extends Controller
{

    public function view()
    {
      return view('auth.register');
    }

      public function register(Request $request)
      {
        $this->validate($request,[
    		'email' => 'required|unique:users,email',
    		'code' => 'required'
    	]);
         $code = rand(0000,9999);
         $user = new User();
         $user->name = $request->name;
         $user->email = $request->email;
         $user->code = $code;
         $user->status = '0';
         $user->password = bcrypt($request->password);
         $user->save();

         $data = array(
           'email' => $request->email,
           'code' => $code,
         );

         Mail::send('backend.emails.varify-email', $data, function($message_mail) use($data){
              $message_mail->from('afzalshuhag16@gmail.com','POS');
               $message_mail->to($data['email']);
               $message_mail->subject('Please Vartify Your Email Address');
          });

          return redirect()->route('everify')->with('success_message_top','You have successfully signed up, now verify your email');
      }

      public function everify(){
          return view('backend.emails.verify');
      }

      public function verify_login(Request $request)
      {
        $this->validate($request,[
    		'email' => 'required',
    		'code' => 'required'
    	]);

        $checkdata = User::where('email',$request->email)->where('code',$request->code)->first();
    		if($checkdata){
    			$checkdata->status = '1';
    			$checkdata->save();
    			return redirect()->route('login')->with('success_message_top','Your have been Successfully verified!!, login now');
    		}else{
    			return redirect()->back()->with('error','Sorry Your Email Or Varification Code Does not Match');
    		}
      }
}
