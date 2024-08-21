<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function redirect()
    {
        if (Auth::id()) {



            if (Auth::user()->userType == '0') {
                $doctors = Doctor::all();
                return view('user.home', compact('doctors'));
            } else {

                return view('admin.home');
            }
        } else {
            return redirect()->route('login');
        }
    }
    public function index()
    {
        if (Auth::user()) {
            return redirect('home');
        } else {


            $doctors = Doctor::all();

            return view('user.home', compact('doctors'));
        }
    }


}
