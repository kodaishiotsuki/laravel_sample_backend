<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sclass;
use Illuminate\Http\Request;

class SclassController extends Controller
{
    public function Index()
    {
        $sclass = Sclass::latest()->get();
        return response()->json($sclass);
    }

    public function Store(Request $request)
    {
        //バリデーション
        $validateDate = $request->validate([
            'class_name' => 'required |unique:sclasses| max:25'
        ]);

        //insert
        Sclass::insert([
            'class_name' => $request->class_name,
        ]);
        return response('Student Class Inserted Successfully');
    }

    public function Edit($id)
    {
        $sclass = Sclass::findOrFail($id); //一致するidが見つからない場合はエラーを返す
        return response()->json($sclass);
    }

    public function Update(Request $request, $id)
    {
        //update
        Sclass::findOrFail($id)->update([
            'class_name' => $request->class_name,
        ]);
        return response('Student Class Updated Successfully');
    }

    public function Delete($id)
    {
        //delete
        Sclass::findOrFail($id)->delete();
        return response('Student Class Deleted Successfully');
    }
}
