<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{

    public function Index()
    {
        $subject = Subject::latest()->get();
        return response()->json($subject);
    }


    public function Store(Request $request)
    {
        //バリデーション
        $validateDate = $request->validate([
            'class_id' => 'required',
            'subject_name' => 'required |unique:subjects| max:25',
        ]);

        //insert
        Subject::insert([
            'class_id' => $request->class_id,
            'subject_name' => $request->subject_name,
            'subject_code' => $request->subject_code,
        ]);
        return response('Student Subject Inserted Successfully');
    }


    public function subEdit($id)
    {
        $subject = Subject::findOrFail($id); //一致するidが見つからない場合はエラーを返す
        return response()->json($subject);
    }

    public function Update(Request $request, $id)
    {
        //update
        Subject::findOrFail($id)->update([
            'class_id' => $request->class_id,
            'subject_name' => $request->subject_name,
            'subject_code' => $request->subject_code,
        ]);
        return response('Student Subject Updated Successfully');
    }

    public function Delete($id)
    {
        //delete
        Subject::findOrFail($id)->delete();
        return response('Student Subject Deleted Successfully');
    }
}
