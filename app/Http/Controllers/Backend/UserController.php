<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function view()
    {
      $data['allData'] = User::all();
      return view('backend.user.view-user',$data);
    }

    public function viewUnapprove()
    {
      $data['users'] = User::where('approved','0')->get();
      return view('backend.user.view-unapproveduser',$data);
    }

    public function approve(Request $request,$id)
    {
      $user = User::find($id);
      $user->approved = '1';
      $user->save();
      return redirect()->route('unapprovedusers.view')->with('success_message_top','User has been approved!');
    }

    public function add()
    {
      return view('backend.user.add-user');
    }

    public function store(Request $request)
    {
      $this->validate($request,[
        'role' => 'required',
        'email' => 'required|unique:users,email',
        'name' => 'required|string',
        'password' => 'confirmed',
      ],
      [
        'email.required' => 'Please Provide an email',
      ]
    );

      $data = new User();

      $code = rand(1111,9999);
      $data->code = $code;
      $data->password = bcrypt($code);
      $data->role = $request->role;
      $data->name = $request->name;
      $data->email = $request->email;
      $data->save();

      return redirect()->route('users.view')->with('success_message_top', 'Data inserted Successfully!!');

    }

    public function edit($id)
    {
      $editData = User::find($id);
      return view('backend.user.edit-user',compact('editData'));
    }

    public function update(Request $request,$id)
    {

      $this->validate($request,[
        'role' => 'required',
        'email' => 'required',
        'name' => 'required|string',
        'password' => 'confirmed',
      ],
      [
        'email.required' => 'Please Provide an email',
      ]
    );

      $data = User::find($id);

      $data->role = $request->role;
      $data->name = $request->name;
      $data->email = $request->email;
      $data->save();

      // session()->flash('success', 'Data updated Successfully!!');
      return redirect()->route('users.view')->with('success_message_top', 'Data updated Successfully!!');


    }

    public function delete($id)
    {
      $user = User::find($id);
      if(file_exists('public/upload/user_images' . $user->image) AND !empty($user->image))
      {
        unlink('public/upload/user_images' . $user->image);
      }
      $user->delete();

      return redirect()->route('users.view')->with('success_message_top', 'Data deleted Successfully!!');
    }
}
