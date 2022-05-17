<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    // All Appointments
    public function all_appointment()
    {
        $appointments = Appointment::all();
        return view('admin.appointment.index', compact('appointments'));
    }


    // Appointment Approved
    public function appoint_approved($id)
    {
        $data = Appointment::find($id);
        $data->status = 'Approved';
        $data->save();
        return redirect()->back();
    }


    // Appointment Cancel
    public function appoint_cancel($id)
    {
        $data = Appointment::find($id);
        $data->status = 'Cancel';
        $data->save();
        return redirect()->back();
    }
}
