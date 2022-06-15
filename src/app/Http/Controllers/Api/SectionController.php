<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SectionController extends Controller
{
    public function sectionIndex()
    {
        $section = Section::latest()->get();
        return response()->json($section);
    }


    public function sectionStore(Request $request)
    {
        //バリデーション
        $validateDate = $request->validate([
            'section_name' => 'required |unique:sections| max:25',
        ]);

        //insert
        Section::insert([
            'class_id' => $request->class_id,
            'section_name' => $request->section_name,
            'created_at' => Carbon::now(),
        ]);
        return response('Student Section Inserted Successfully');
    }


    public function sectionEdit($id)
    {
        $section = Section::findOrFail($id); //一致するidが見つからない場合はエラーを返す
        return response()->json($section);
    }

    public function sectionUpdate(Request $request, $id)
    {
        //update
        Section::findOrFail($id)->update([
            'class_id' => $request->class_id,
            'section_name' => $request->section_name,
        ]);
        return response('Student Section Updated Successfully');
    }

    public function sectionDelete($id)
    {
        //delete
        Section::findOrFail($id)->delete();
        return response('Student Section Deleted Successfully');
    }
}
