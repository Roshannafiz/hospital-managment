<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmectController extends Controller
{

    // Save Appointment In Database
    public function appointment(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $appointment = new Appointment();
            $appointment->name = $data['name'];
            $appointment->email = $data['email'];
            $appointment->date = $data['date'];
            $appointment->doctor = $data['doctor'];
            $appointment->phone = $data['phone'];
            $appointment->message = $data['message'];
            $appointment->status = 'In Progress';
            if (Auth::id()) {
                $appointment->user_id = Auth::user()->id;
            }
            $appointment->save();
            return redirect('/my-appointment')->with('message', "Appointment Request Successfully. We Will Contact With You Soon... 🙂");
        }
    }


    // Show Appointments In User Panel
    public function my_appointment()
    {
        if (Auth::id()) {
            // Get All Doctors
            $doctors = Doctor::all();

            $userid = Auth::user()->id;
            $appoints = Appointment::where('user_id', $userid)->get();

            return view('frontend.appointment.index', compact('doctors', 'appoints'));
        } else {
            return redirect()->back();
        }
    }


    // Cancel Appointment
    public function cancel_appoint($id)
    {
        $data = Appointment::find($id);
        $data->delete();
        return redirect()->back()->with('message', "Appointment Deleted Successfully");
    }



}
