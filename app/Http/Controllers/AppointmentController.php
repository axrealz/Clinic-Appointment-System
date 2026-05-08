<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    // 👑 ADMIN VIEW
    public function index()
    {
        $appointments = Appointment::with(['doctor', 'patient'])->latest()->get();
        $doctors = Doctor::where('role', 'Doctor')->get();

        return view('admin.appointments', compact('appointments', 'doctors'));
    }

    // 👤 USER VIEW
    public function userView()
    {
        $doctors = Doctor::where('role', 'Doctor')->get();
        return view('user.dashboard', compact('doctors'));
    }

    // 👩‍💼 RECEPTIONIST VIEW
    public function receptionistView()
    {
        $today = date('Y-m-d');

        $appointments = Appointment::with('patient')
            ->where('date', $today)
            ->get();

        $doctors = Doctor::where('role', 'Doctor')->get();

        return view('receptionist.dashboard', compact('appointments', 'doctors'));
    }

    // ➕ CREATE (ADMIN + USER + RECEPTIONIST)
    public function store(Request $request)
    {
        $request->validate([
            'patient_name' => 'required',
            'email' => 'required|email',
            'gender' => 'required',
            'contact' => 'required',
            'address' => 'required',
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'doctor_id' => 'required',
        ]);

        // ✅ CHECK SCHEDULE CONFLICT
        $conflict = Appointment::where('doctor_id', $request->doctor_id)
            ->where('date', $request->date)
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_time', [$request->start_time, $request->end_time])
                      ->orWhereBetween('end_time', [$request->start_time, $request->end_time]);
            })
            ->exists();

        if ($conflict) {
            return back()->with('error', 'Doctor not available at this time!');
        }

        // ✅ CHECK EXISTING PATIENT
        $patient = Patient::where('email', $request->email)->first();

        if (!$patient) {
            $patient = Patient::create([
                'name' => $request->patient_name,
                'email' => $request->email,
                'gender' => $request->gender,
                'contact' => $request->contact,
                'address' => $request->address,
            ]);
        }

        // ✅ 🔥 FIXED: INCLUDE patient_name + others
        $appointment = Appointment::create([
            'patient_id' => $patient->id,

            // 🔥 REQUIRED FIELDS (FIX YOUR ERROR)
            'patient_name' => $request->patient_name,
            'email' => $request->email,
            'gender' => $request->gender,
            'contact' => $request->contact,
            'address' => $request->address,

            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'doctor_id' => $request->doctor_id,
            'status' => 'Pending',
        ]);

        // ✅ UPDATE REPORT
        $this->updateReportTable($appointment->id);

        // ✅ ROLE REDIRECT
        if (Auth::check()) {
            if (Auth::user()->role === 'admin') {
                return redirect('/admin/appointments')->with('success', 'Appointment added!');
            }

            if (Auth::user()->role === 'receptionist') {
                return redirect('/receptionist/dashboard')->with('success', 'Appointment booked!');
            }
        }

        return redirect('/user/dashboard')->with('success', 'Appointment booked!');
    }

    // ✏️ EDIT
    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        $doctors = Doctor::where('role', 'Doctor')->get();

        return view('admin.edit-appointment', compact('appointment', 'doctors'));
    }

    // ✅ UPDATE STATUS (ADMIN ONLY)
    public function updateStatus($id, $status)
    {
        $appointment = Appointment::findOrFail($id);

        if (!in_array($status, ['Approved', 'Cancelled'])) {
            return back()->with('error', 'Invalid status');
        }

        $appointment->status = $status;
        $appointment->save();

        // ✅ UPDATE REPORT
        $this->updateReportTable($appointment->id);

        return redirect('/admin/appointments')->with('success', 'Status updated!');
    }

    // 🔄 UPDATE
    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'doctor_id' => 'required',
        ]);

        $appointment = Appointment::findOrFail($id);

        $appointment->update([
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'doctor_id' => $request->doctor_id,
        ]);

        return redirect('/admin/appointments')->with('success', 'Appointment updated!');
    }

    // ❌ DELETE
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);

        Appointment::destroy($id);

        // ✅ UPDATE REPORT
        $this->updateReportTable($appointment->id);

        return redirect('/admin/appointments')->with('success', 'Appointment deleted!');
    }

    // 🔥 REPORT FUNCTION
    private function updateReportTable($appointmentId)
    {
        Report::create([
            'appointment_id' => $appointmentId,
            'total_patients' => Patient::count(),
            'total_appointments' => Appointment::count(),
            'pending' => Appointment::where('status', 'Pending')->count(),
            'approved' => Appointment::where('status', 'Approved')->count(),
            'cancelled' => Appointment::where('status', 'Cancelled')->count(),
        ]);
    }
}   