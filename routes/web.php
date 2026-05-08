<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AppointmentController;
use App\Models\Appointment;
use App\Models\Doctor;

Route::get('/hello', function () {
    return 'Welcome Axel!';
});

// ✅ LOGOUT
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/login');
})->name('logout');

// ✅ CHECK AVAILABILITY (NEW FEATURE)
Route::get('/check-availability', [AppointmentController::class, 'checkAvailability']);


// 🔁 REDIRECT BASED ON ROLE
Route::get('/dashboard', function () {

    if (!auth()->check()) {
        return redirect('/login');
    }

    if (auth()->user()->role === 'admin') {
        return redirect('/admin/dashboard');
    }

    if (auth()->user()->role === 'receptionist') {
        return redirect('/receptionist/dashboard');
    }

    return redirect('/user/dashboard');

})->middleware(['auth'])->name('dashboard');


// 👑 ADMIN ROUTES
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', function () {

        $appointments = Appointment::latest()->take(5)->get();

        $totalAppointments = Appointment::count();

        $totalPatients = Appointment::distinct('email')->count('email');

        $totalStaff = Doctor::where('role', 'Doctor')->count();

        return view('admin.dashboard', compact(
            'appointments',
            'totalAppointments',
            'totalPatients',
            'totalStaff'
        ));
    });

    Route::get('/admin/reports', function () {

        return view('admin.reports', [
            'totalPatients' => \App\Models\Appointment::distinct('email')->count('email'),
            'totalAppointments' => \App\Models\Appointment::count(),
            'pending' => \App\Models\Appointment::where('status', 'Pending')->count(),
            'approved' => \App\Models\Appointment::where('status', 'Approved')->count(),
            'done' => \App\Models\Appointment::where('status', 'Done')->count(),
        ]);

    });

    Route::get('/admin/appointments', [AppointmentController::class, 'index']);
    Route::post('/admin/appointments', [AppointmentController::class, 'store']);

    Route::get('/admin/appointments/{id}/edit', [AppointmentController::class, 'edit']);
    Route::post('/admin/appointments/{id}/update', [AppointmentController::class, 'update']);
    Route::post('/admin/appointments/{id}/delete', [AppointmentController::class, 'destroy']);

    Route::post('/admin/appointments/{id}/status/{status}', [AppointmentController::class, 'updateStatus']);

    Route::post('/admin/appointments/{id}/status', [AppointmentController::class, 'updateStatus']);

    // STAFF
    Route::get('/admin/staff', function () {

        $staff = Doctor::where('role', 'Doctor')->get();

        return view('admin.staff', compact('staff'));

    });

    // PATIENTS
    Route::get('/admin/patients', function () {

        $patients = Appointment::all();

        return view('admin.patients', compact('patients'));

    });

});


// 👩‍💼 RECEPTIONIST ROUTES
Route::middleware(['auth', 'role:receptionist'])->group(function () {

    Route::get('/receptionist/dashboard', function () {

        $today = date('Y-m-d');

        $appointments = Appointment::where('date', $today)->get();

        // ✅ ONLY DOCTORS
        $doctors = Doctor::where('role', 'Doctor')->get();

        return view('receptionist.dashboard', compact('appointments', 'doctors'));

    });

    Route::post('/receptionist/book', [AppointmentController::class, 'store']);

    Route::post('/receptionist/appointments/{id}/arrived', function ($id) {

        $appointment = App\Models\Appointment::find($id);

        $appointment->status = 'Arrived';

        $appointment->save();

        return back()->with('success', 'Patient checked in');

    });

});


// 👤 USER ROUTES
Route::middleware(['auth', 'role:user'])->group(function () {

    Route::get('/user/dashboard', [AppointmentController::class, 'userView']);

    Route::post('/user/book', [AppointmentController::class, 'store']);

});


// 👤 PROFILE
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';