<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function studentIndex()
    {
        $student = Student::latest()->get();
        return response()->json($student);
    }


    public function studentStore(Request $request)
    {
        //バリデーション
        $validateDate = $request->validate([
            'name' => 'required |unique:students| max:25',
            'email' => 'required |unique:students| max:25',
        ]);

        //insert
        Student::insert([
            'class_id' => $request->class_id,
            'section_id' => $request->section_id,
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'photo' => $request->photo,
            'gender' => $request->gender,
            'created_at' => Carbon::now(),
        ]);
        return response('Student Section Inserted Successfully');
    }

    public function studentEdit($id)
    {
        $student = Student::findOrFail($id); //一致するidが見つからない場合はエラーを返す
        return response()->json($student);
    }

    public function studentUpdate(Request $request, $id)
    {
        //update
        Student::findOrFail($id)->update([
            'class_id' => $request->class_id,
            'section_id' => $request->section_id,
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'photo' => $request->photo,
            'gender' => $request->gender,
        ]);
        return response('Student Information Updated Successfully');
    }

    public function studentDelete($id)
    {
        //delete
        Student::findOrFail($id)->delete();
        return response('Student Information Deleted Successfully');
    }
}
