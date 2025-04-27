<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function index()
    {
        if(!auth()->user()){
            return redirect(route('login'));
        }


        $appointments = Appointment::where('user_id', auth()->id())->orderBy('appointment_date', 'asc')->get();
        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        return view('appointments.create');
    }




    public function store(Request $request)
    {
        $request->validate([
            'appointment_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);


        Appointment::create([
            'user_id' => auth()->id(),
            'appointment_date' => $request->appointment_date,
            'notes' => $request->notes,
        ]);

        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully.');
    }
}
