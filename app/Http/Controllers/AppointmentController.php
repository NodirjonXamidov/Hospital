<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function create()
    {
        $doctors = Doctor::all();
        return view('appointment.create', compact('doctors'));
    }

    public function appointment(Request $request)
    {

        $data = new Appointment;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->date = $request->date;
        $data->phone = $request->number;
        $data->message = $request->message;
        $data->doctor = $request->doctor;
        $data->status = 'In progress';

        if (Auth::id()) {
            $data->user_id = Auth::user()->id;
        }

        $data->save();

        return redirect()->back()->with('message', 'Appointment Request Successful . We will contact with soon');
    }
    public function myappointment(){
        if (Auth::id()){
            $userId = Auth::user()->id;
            $appoint = appointment::where('user_id',$userId)->get();

            return view('user.my_appointment', compact('appoint'));
        }
        else
        {
            return redirect()->back();
        }
    }

    public function cancel_appoint($id){
        $data =appointment::find($id);
        $data->delete();
        return redirect()->back();

    }
}
