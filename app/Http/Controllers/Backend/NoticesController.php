<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Notice;
use App\User;
use Auth;

class NoticesController extends Controller
{

    public function view()
    {
      $data['allData'] = Notice::orderBy('id','desc')->get();
      return view('backend.notice.view_notice',$data);
    }


    public function add()
    {
        return view('backend.notice.add_notice');
    }


    public function store(Request $request)
    {
        $notice = new Notice();
        $notice->title = $request->title;
        $notice->description = $request->description;
        $notice->created_by = Auth::user()->id;
        $notice->save();

        return redirect()->route('notices.add')->with('success_message_top','Notice added Successfully');
    }

    public function edit($id)
    {
        //
    }



    public function update(Request $request, $id)
    {
        //
    }

    public function delete($id)
    {
        $notice = Notice::find($id);
        $notice->delete();
        return redirect()->route('notices.view')->with('success_message_top','Notice deleted');
    }
}
