<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Chat;
use App\Model\GroupChat;
use App\User;
use Auth;

class ChatController extends Controller
{
    public function view()
    {
      $data['groups'] = GroupChat::select('name')->groupBy('name')->where('user_id',Auth::user()->id)->get();
      $data['users'] = User::all();
      $data['messages'] = Chat::where('sender_id',null)->where('reciever_id',null)->orderBy('id','asc')->get();
      return view('backend.chat.chat_box',$data);
    }

    public function store(Request $request)
    {
      $message = new Chat();
      $message->user_id = Auth::user()->id;
      $message->text = $request->text;
      $message->save();

      return redirect()->back();
    }

    public function chatIndividual(Request $request)
    {
      if ($request->user_id == null) {
        return redirect()->route('home')->with('error_message_top','Select an user first!!');
      }else{
        $user_id = $request->user_id;
        $my_id = Auth::user()->id;
        $data['reciever'] = User::where('id',$user_id)->first();
        $data['my_messages'] = Chat::where('sender_id',$my_id)->where('reciever_id',$user_id)->orderBy('id','asc')->get();
        $data['reciever_messages'] = Chat::where('sender_id',$user_id)->where('reciever_id',$my_id)->orderBy('id','asc')->get();
        $data['messages'] = Chat::where('sender_id',$my_id)->where('reciever_id',$user_id)->orWhere('sender_id',$user_id)->where('reciever_id',$my_id)->orderBy('id','asc')->get();
        $data['reciever_id'] = $user_id;
        return view('backend.chat.chat_individual',$data);
      }
    }

    public function individualStore(Request $request)
    {
      $message = new Chat();
      $message->user_id = Auth::user()->id;
      $message->text = $request->text;
      $message->reciever_id = $request->reciever_id;
      $message->sender_id = Auth::user()->id;
      $message->save();

      return redirect()->back();
    }
}
