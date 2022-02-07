<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SingleImage;
use Illuminate\Support\Facades\File;

class singleImageUpload extends Controller
{
    public function index()
    {
        $students = SingleImage::all();
        return view('student.all_student',compact('students'));
    }

    
    public function addStudent()
    {
        return view('student.single_image');
    }

    public function storeStudent(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required'],
            'profile_image' => ['required']
        ]);

        $student = new SingleImage;
        $student->name = $request->input('name');

        if($request->hasFile('profile_image')){

            $file = $request->file('profile_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/students/',$filename);
            $student->profile_image = $filename;
        }
        $student->save();
        return redirect()->back()->with('status','Student Created Successfullly!');

    }

    public function edit($id)
    {
        $student = SingleImage::find($id);
        return view('student.edit',compact('student'));
    }

    public function update(Request $request,$id)
    {
        $student = SingleImage::find($id);
        $student->name = $request->input('name');

        if($request->hasFile('profile_image')){

            $destinaion = 'uploads/students/'.$student->profile_image;
            if(File::exists($destinaion))
            {
                File::delete($destinaion);
            }

            $file = $request->file('profile_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/students/',$filename);
            $student->profile_image = $filename;
        }
       
        $student->update();

        return redirect()->back()->with('status','Student Updated Successfullly!');

    }


    public function destroy($id)
    {
        $student = SingleImage::find($id);
        $destinaion = 'uploads/students/'.$student->profile_image;
        if(File::exists($destinaion))
        {
            File::delete($destinaion);
        }
        $student->delete();
        return redirect()->back()->with('status','Student Deleted Successfullly!');
    }
}
