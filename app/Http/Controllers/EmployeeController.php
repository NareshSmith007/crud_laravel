<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
{
    public function index()
    {
        $data=Employee::get();
        return view('Employee.index',['list_Employee'=>$data]);
    }
    public function addemployee()
    {
        return view('Employee.addemployee');
    }
    public function insertemployee(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'course' => 'required',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $employee =new Employee;
        $employee->name=$request->input('name');
        $employee->email=$request->input('email');
        $employee->phone_no=$request->input('phone');
        $employee->course=$request->input('course');
        if($request->hasfile('image'))
        {
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().".".$extension;
            $file->move('././images',$filename);
            $employee->image=$filename;
        }

        $employee->save();
        return redirect('employee')->with('message','Employee Data added Successfully');
    }
    public function editemployee($id)
    {
        $data=Employee::find($id);
        return view('Employee.editemployee',['employeedetail'=>$data]);
    }
    public function updatemployee(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'course' => 'required',
        ]);

        $employee=Employee::find($request->input('student_id'));
        $employee->name=$request->input('name');
        $employee->email=$request->input('email');
        $employee->phone_no=$request->input('phone');
        $employee->course=$request->input('course');
        if($request->hasfile('image'))
        {
            $destination='././images'.$employee->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().".".$extension;
            $file->move('././images',$filename);
            $fname=$filename;
            $employee->image=$fname;
        }
        if(empty($fname))
        {
            $employee->image=$request->input('oldimage');
        }
        $employee->update();
        return redirect('employee')->with('message','Employee Data updated Successfully');
    }
    public function deletemployee($id)
    {
        $data=Employee::find($id);
        $data->delete();
        return back()->with('error','Employee Data Deleted');
    }
}
