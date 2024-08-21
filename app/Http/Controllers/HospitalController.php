<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function HospitalLocation()
    {

        $data = Hospital::all();
        redirect()->back();
        return view('admin.location', compact('data'));
    }

    public function create()
    {
        $data = Hospital::all();
        return view('admin.addHospital',compact('data'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'INN' => 'required|integer',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $hospital = new Hospital;
        $hospital->name = $validatedData['name'];
        $hospital->address = $validatedData['address'];
        $hospital->phone = $validatedData['phone'];
        $hospital->INN = $validatedData['INN'];
        $hospital->latitude = $validatedData['latitude'];
        $hospital->longitude = $validatedData['longitude'];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $hospital->image = 'images/' . $imageName;
        }

        $hospital->save();

        return redirect()->back()->with('success', 'Hospital created successfully!');
    }
}
