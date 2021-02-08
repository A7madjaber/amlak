<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function index()
    {

        $messages=Message::all();
        return view('admin.messages.index',compact('messages'));
    }

public function show($id)
    {
        $message=Message::findOrFail($id);
        $message->update(['is_read'=>1]);
        return view('admin.messages.show',compact('message'));
    }



    public function send(Request $request){
        Message::create($request->all());
        return redirect()->route('home')
            ->with(['message' => 'تم ارسال الرسالة بنجاح , شكرا لتواصلك معنا', 'alert-type' => 'success']);;
    }

public function destroy(Request $request){
    $message= Message::findOrFail($request->id);
    $message->delete();
    return response()->json(['message'=>'تم حذف   الرسالة بنجاح','status'=>true],200);
}
}
