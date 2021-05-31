<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Model\GroupChat;
use Auth;

class GroupChatController extends Controller
{
    public function add()
    {
      $users = User::all();
      return view('backend.group_chat.group_chat_add',compact('users'));
    }

    public function create(Request $request)
    {
      $count = sizeof($request->user_id);
      for ($i=0; $i < $count; $i++) {
        $group = new GroupChat();
        $group->user_id = $request->user_id[$i];
        $group->name = $request->name;
        $group->save();
      }

      return redirect()->route('group.chat.add')->with('success_message_top','Group Created Successfully!');
    }

    public function customGroupView(Request $request)
    {
      $groups = GroupChat::select('name')->groupBy('name')->where('user_id',Auth::user()->id)->get();
      $name = $request->group_name;
      $messages = GroupChat::where('name',$name)->where('text','!=',null)->orderBy('id','asc')->get();
      $group_name = GroupChat::where('name',$name)->first()->name;
      return view('backend.group_chat.custom_group',compact('messages','groups','group_name'));
    }

    public function store(Request $request)
    {
      $chat = new GroupChat();
      $chat->user_id = Auth::user()->id;
      $chat->name = $request->name;
      $chat->text = $request->text;
      $chat->save();
      return redirect()->back();
    }
}
