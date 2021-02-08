<?php

namespace App\Http\Controllers\Admin;

use App\Building;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditUsersRequest;
use App\Http\Requests\UsersRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::where('id', '!=', auth()->id())->get();
        return view('admin.user.index',compact('users'));
    }


    public function create()
    {
        return view('admin.user.create');
    }


   public function store(UsersRequest $request){

        $request->merge(['password'=>bcrypt($request->password)]);
        User::create($request->all());
        return redirect()->route('admin.user.index')
            ->with(['message' => 'تم الاضافة بنجاح بنجاح', 'alert-type' => 'success']);

    }



    public function edit($id)

    {
        $building_active=Building::where('user_id',$id)->where('status',1)->get();
        $building_Notactive=Building::where('user_id',$id)->where('status',0)->get();
        $user=User::find($id);
        return view('admin.user.edit', compact('user','building_active','building_Notactive'));
    }



    public function update(EditUsersRequest $request, $id)
    {
        if ($request->password=='') {
            $User=User::find($id);
            $User->update($request->except('password'));
        }else {

            $User=User::find($id);
            $request->merge(['password'=>bcrypt($request->password)]);
            $User->update($request->all());
        }

        return redirect()->route('admin.user.index')
            ->with(['message' => 'تم تعديل المستخدم بنجاح', 'alert-type' => 'success']);

    }



    public function destroy(Request $request )
    {
        $user= User::findOrFail($request->id);
        $user->delete();
        return response()->json(['message'=>'تم حذف المستخدم بنجاح','status'=>true],200);
    }

}


