<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;

class ProfileController extends Controller
{
    public function view()
    {
      $id = Auth::user()->id;
      $user = User::find($id);

      return view('backend.user.view-profile', compact('user'));
    }

    public function edit()
    {
      $id = Auth::user()->id;
      $editData = User::find($id);
      return view('backend.user.edit-profile', compact('editData'));
    }

    public function update(Request $request, $id)
    {

      $this->validate($request,[
        'name' => 'required|string',
        'email' => 'required',
        'address' => 'required',
        'password' => 'confirmed',
        'gender' => 'required',
        'mobile' => 'required',
      ],
      [
        'email.required' => 'Please Provide an email',
      ]
    );

      $data = User::find($id);

      $data->name = $request->name;
      $data->email = $request->email;
      $data->address = $request->address;
      $data->gender = $request->gender;
      $data->mobile = $request->mobile;
      if($request->file('image')){
        $file = $request->file('image');
        @unlink(public_path('upload/user_images/' . $data->image));
        $filename = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('upload/user_images'), $filename);
        $data['image'] = $filename;
      }
      $data->save();

      // session()->flash('success', 'Data updated Successfully!!');
      return redirect()->route('profiles.view')->with('success_message_top', 'Profile updated Successfully!!');

    }

    public function passwordView()
    {
      return view('backend.user.edit-password');
    }

    public function passwordUpdate(Request $request)
    {
      $this->validate($request,[
        'current_password' => 'required',
        'password' => 'required|confirmed',
        'password_confirmation' => 'required',
      ],
      [
        'name.required' => 'Please Provide an email',
      ]
      );

      if(Auth::attempt(['id' => Auth::user()->id , 'password' => $request->current_password])){
        $user = User::find(Auth::user()->id);
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('profiles.view')->with('success_message_top','Your Password has been changed Successfully!!!');
      }else{
        return redirect()->back()->with('error_message_top','Ooops!! Your Current Password does not macth');
      }

    }
}
