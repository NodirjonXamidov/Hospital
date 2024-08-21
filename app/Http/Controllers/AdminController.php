<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{

    public function addview()
    {

        return view('admin.add_doctor');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|numeric',
            'speciality' => 'required|string',
            'room' => 'required|numeric',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $doctor = new Doctor;
        $doctor->name = $request->name;
        $doctor->phone = $request->number;
        $doctor->speciality = $request->speciality;
        $doctor->room = $request->room;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('doctor_images'), $filename);
            $doctor->image = $filename;
        }

        $doctor->save();

        return redirect()->back()->with('message', 'Doctor added successfully');
    
    }
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'number' => 'required|string|max:15',
            'room' => 'required|string|max:50',
            'specialty	' => 'required|string|max:100',
        ]);

        $doctor = new Doctor();
        $imageName = Str::random(32).".".$request->file->getClientOriginalExtension();
        $path = $request->file('file')->storeAs(
            'avatars', $imageName
        );
        $doctor->image = $path;
        $doctor->name = $request->name;
        $doctor->phone = $request->number;
        $doctor->room = $request->room;
        $doctor->specialty	 = $request->specialty	;
        $doctor->save();

        return redirect()->back()->with('success', 'Doctor added successfully.');
    }


    public function showAppointment ()
    {
        $data = Appointment::all();
    return view('admin.showAppointment',compact('data'));
    }

    public function approved($id){
        $data = Appointment::find($id);
        $data ->status = 'approved';
        $data->save();
        return redirect()->back();
    }

    public function cancel($id)
    {
        $date = Appointment::find($id);
        $date->status = 'Cancel';
        $date->save();
        return redirect()->back();
    }

    public function showdoctor()
    {
        $data = Doctor::all();
        return view('admin.showdoctor',compact('data'));
    }

    public function deleteDoctor($id)
    {
        $data = Doctor::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function updateDoctor($id)
    {
        $data = Doctor::find($id);
    return view('admin.updateDoctor',compact('data'));
    }

    public function editDoctor(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'number' => 'required|string|max:15',
            'room' => 'required|string|max:50',
            'speciality' => 'required|string|max:100',
        ]);

        $doctor = new Doctor();

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/doctorimage', $imagename);
            $doctor->image = $imagename;
        }

        $doctor->name = $request->name;
        $doctor->phone = $request->number;
        $doctor->room = $request->room;
        $doctor->speciality = $request->speciality;
        $doctor->save();

        return redirect()->back()->with('success', 'Doctor added successfully.');
    }



}
