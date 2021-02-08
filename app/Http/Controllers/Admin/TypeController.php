<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {

        $types=Type::withCount('buildings')->get();
        return view('admin.type.index',compact('types'));
    }


    public function store(Request $request)
    {
        Type::create($request->all());
        return redirect()->back()->with(['message' => 'تمت الاضافة بنجاح', 'alert-type' => 'success']);;
    }


    public function update(Request $request)
    {
        $type= Type::find($request->id);
        $type->update($request->all());
        return redirect()->back()->with(['message' => 'تم التعديل بنجاح', 'alert-type' => 'success']);

    }

    public function destroy(Request $request)
    {
        $type= Type::findOrFail($request->id);
        $type->delete();
        return response()->json(['message'=>'تم الحذف  بنجاح','status'=>true],200);
    }
}
