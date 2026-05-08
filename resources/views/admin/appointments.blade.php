<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Appointments — UHealth</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
    --navy:       #0d1b2a;
    --navy-mid:   #1a2e45;
    --navy-light: #243b55;
    --blue:       #2563eb;
    --blue-light: #3b82f6;
    --blue-pale:  #eff6ff;
    --green:      #059669;
    --green-pale: #ecfdf5;
    --amber:      #d97706;
    --amber-pale: #fffbeb;
    --red:        #dc2626;
    --red-pale:   #fef2f2;
    --border:     #e2e8f0;
    --bg:         #f1f5f9;
    --white:      #ffffff;
    --text:       #0f172a;
    --text-muted: #64748b;
    --sidebar-w:  260px;
    --radius:     14px;
    --shadow-sm:  0 1px 3px rgba(0,0,0,0.08);
    --shadow:     0 4px 16px rgba(0,0,0,0.08), 0 1px 4px rgba(0,0,0,0.04);
    --shadow-lg:  0 10px 40px rgba(0,0,0,0.1);
}

body { font-family: 'Plus Jakarta Sans', sans-serif; background: var(--bg); color: var(--text); display: flex; min-height: 100vh; font-size: 14px; }

/* SIDEBAR */
.sidebar { width: var(--sidebar-w); min-height: 100vh; background: var(--navy); display: flex; flex-direction: column; position: fixed; top: 0; left: 0; z-index: 100; box-shadow: 4px 0 24px rgba(0,0,0,0.15); }
.sidebar-logo { padding: 28px 24px 24px; border-bottom: 1px solid rgba(255,255,255,0.07); display: flex; align-items: center; gap: 12px; }
.logo-icon { width: 40px; height: 40px; background: var(--blue); border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 20px; flex-shrink: 0; }
.logo-text { font-size: 20px; font-weight: 800; color: var(--white); letter-spacing: -0.5px; }
.logo-text span { color: var(--blue-light); }
.sidebar-nav { padding: 20px 16px; flex: 1; }
.nav-label { font-size: 10px; font-weight: 700; letter-spacing: 1.2px; text-transform: uppercase; color: rgba(255,255,255,0.3); padding: 0 12px; margin-bottom: 8px; margin-top: 16px; }
.nav-label:first-child { margin-top: 0; }
.sidebar-nav a { display: flex; align-items: center; gap: 12px; padding: 11px 14px; border-radius: 10px; color: rgba(255,255,255,0.6); text-decoration: none; font-size: 14px; font-weight: 500; transition: all 0.2s ease; margin-bottom: 2px; }
.nav-icon { width: 36px; height: 36px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 16px; background: rgba(255,255,255,0.05); flex-shrink: 0; transition: all 0.2s ease; }
.sidebar-nav a:hover { background: rgba(255,255,255,0.07); color: var(--white); }
.sidebar-nav a:hover .nav-icon { background: rgba(37,99,235,0.3); }
.sidebar-nav a.active { background: var(--blue); color: var(--white); box-shadow: 0 4px 12px rgba(37,99,235,0.4); }
.sidebar-nav a.active .nav-icon { background: rgba(255,255,255,0.2); }
.sidebar-footer { padding: 16px; border-top: 1px solid rgba(255,255,255,0.07); }
.admin-info { display: flex; align-items: center; gap: 10px; padding: 10px 12px; border-radius: 10px; background: rgba(255,255,255,0.05); }
.admin-avatar { width: 34px; height: 34px; background: var(--blue); border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 15px; flex-shrink: 0; }
.admin-name { font-size: 13px; font-weight: 600; color: var(--white); }
.admin-role { font-size: 11px; color: rgba(255,255,255,0.4); }

/* MAIN */
.main { flex: 1; margin-left: var(--sidebar-w); display: flex; flex-direction: column; }

/* TOPBAR */
.topbar { background: var(--white); padding: 16px 32px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid var(--border); position: sticky; top: 0; z-index: 50; box-shadow: var(--shadow-sm); }
.topbar-left h3 { font-size: 18px; font-weight: 700; }
.topbar-left p { font-size: 12px; color: var(--text-muted); margin-top: 1px; }
.topbar-right { display: flex; align-items: center; gap: 12px; }
.logout-btn { display: flex; align-items: center; gap: 6px; padding: 9px 18px; background: var(--red-pale); color: var(--red); border: 1px solid #fecaca; border-radius: 8px; font-size: 13px; font-weight: 600; cursor: pointer; font-family: inherit; transition: all 0.2s ease; }
.logout-btn:hover { background: var(--red); color: white; border-color: var(--red); }

/* CONTENT */
.content { padding: 32px; flex: 1; }
.page-header { margin-bottom: 28px; }
.page-header h2 { font-size: 24px; font-weight: 800; letter-spacing: -0.5px; }
.page-header p { color: var(--text-muted); margin-top: 4px; }

/* ALERTS */
.alert { padding: 14px 18px; border-radius: 10px; margin-bottom: 20px; font-size: 14px; font-weight: 500; display: flex; align-items: center; gap: 10px; }
.alert-success { background: var(--green-pale); color: #065f46; border: 1px solid #a7f3d0; }
.alert-error { background: var(--red-pale); color: #991b1b; border: 1px solid #fecaca; }

/* FORM CARD */
.form-card { background: var(--white); border-radius: var(--radius); padding: 28px; box-shadow: var(--shadow); border: 1px solid var(--border); margin-bottom: 28px; }
.form-card-header { margin-bottom: 22px; }
.form-card-header h3 { font-size: 16px; font-weight: 700; }
.form-card-header p { font-size: 13px; color: var(--text-muted); margin-top: 3px; }

.form-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; }
.form-grid-2 { display: grid; grid-template-columns: repeat(2, 1fr); gap: 14px; margin-top: 14px; }
.form-group { display: flex; flex-direction: column; gap: 5px; }
.form-label { font-size: 12px; font-weight: 600; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px; }
.form-grid input,
.form-grid-2 input,
.form-grid-2 select { width: 100%; padding: 10px 14px; border: 1.5px solid var(--border); border-radius: 8px; font-size: 13.5px; font-family: inherit; color: var(--text); background: var(--white); transition: border-color 0.18s ease, box-shadow 0.18s ease; outline: none; }
.form-grid input:focus,
.form-grid-2 input:focus,
.form-grid-2 select:focus { border-color: var(--blue); box-shadow: 0 0 0 3px rgba(37,99,235,0.1); }
.form-actions { margin-top: 18px; display: flex; justify-content: flex-end; }
.btn-primary { padding: 10px 24px; background: var(--blue); color: white; border: none; border-radius: 8px; font-size: 14px; font-weight: 600; cursor: pointer; font-family: inherit; transition: all 0.2s ease; display: inline-flex; align-items: center; gap: 6px; }
.btn-primary:hover { background: #1d4ed8; box-shadow: 0 4px 12px rgba(37,99,235,0.35); transform: translateY(-1px); }

/* TABLE CARD */
.card { background: var(--white); border-radius: var(--radius); box-shadow: var(--shadow); border: 1px solid var(--border); overflow: hidden; }
.card-header { padding: 20px 24px; border-bottom: 1px solid var(--border); display: flex; align-items: center; justify-content: space-between; }
.card-header h3 { font-size: 16px; font-weight: 700; }
.card-header p { font-size: 13px; color: var(--text-muted); margin-top: 2px; }
.table-wrap { overflow-x: auto; }
table { width: 100%; border-collapse: collapse; }
thead tr { background: #f8fafc; border-bottom: 1px solid var(--border); }
th { padding: 12px 20px; text-align: left; font-size: 11px; font-weight: 700; letter-spacing: 0.8px; text-transform: uppercase; color: var(--text-muted); white-space: nowrap; }
td { padding: 14px 20px; border-bottom: 1px solid #f1f5f9; font-size: 13.5px; vertical-align: middle; }
tbody tr:last-child td { border-bottom: none; }
tbody tr { transition: background 0.15s ease; }
tbody tr:hover { background: #f8fafc; }

.patient-cell { display: flex; align-items: center; gap: 10px; }
.patient-avatar { width: 32px; height: 32px; border-radius: 8px; background: var(--blue-pale); color: var(--blue); display: flex; align-items: center; justify-content: center; font-size: 13px; font-weight: 700; flex-shrink: 0; }
.patient-name { font-weight: 600; }
.patient-email { font-size: 12px; color: var(--text-muted); }

/* BADGES */
.badge { display: inline-flex; align-items: center; gap: 5px; padding: 4px 10px; border-radius: 20px; font-size: 11.5px; font-weight: 700; white-space: nowrap; }
.badge::before { content: ''; width: 6px; height: 6px; border-radius: 50%; }
.badge-pending { background: var(--amber-pale); color: #92400e; border: 1px solid #fde68a; }
.badge-pending::before { background: var(--amber); }
.badge-approved { background: var(--green-pale); color: #065f46; border: 1px solid #a7f3d0; }
.badge-approved::before { background: var(--green); }
.badge-cancelled { background: var(--red-pale); color: #991b1b; border: 1px solid #fecaca; }
.badge-cancelled::before { background: var(--red); }

/* BUTTONS */
.btn { display: inline-flex; align-items: center; gap: 5px; padding: 6px 12px; border-radius: 7px; font-size: 12px; font-weight: 600; border: none; cursor: pointer; text-decoration: none; font-family: inherit; transition: all 0.18s ease; white-space: nowrap; }
.btn-approve { background: var(--green-pale); color: #065f46; border: 1px solid #a7f3d0; }
.btn-approve:hover { background: var(--green); color: white; border-color: var(--green); }
.btn-cancel-action { background: var(--amber-pale); color: #92400e; border: 1px solid #fde68a; }
.btn-cancel-action:hover { background: var(--amber); color: white; border-color: var(--amber); }
.btn-edit { background: var(--blue-pale); color: var(--blue); border: 1px solid #bfdbfe; }
.btn-edit:hover { background: var(--blue); color: white; border-color: var(--blue); }
.btn-delete { background: var(--red-pale); color: var(--red); border: 1px solid #fecaca; }
.btn-delete:hover { background: var(--red); color: white; border-color: var(--red); }
.status-form { display: inline; margin: 0; }
.action-row { display: flex; align-items: center; gap: 6px; flex-wrap: wrap; margin-top: 6px; }
.time-text { font-size: 12.5px; color: var(--text-muted); }
.doctor-text { font-size: 13px; color: var(--text-muted); }
</style>
</head>

<body>

<div class="sidebar">
    <div class="sidebar-logo">
        <div class="logo-icon">🏥</div>
        <div class="logo-text">U<span>Health</span></div>
    </div>
    <nav class="sidebar-nav">
        <div class="nav-label">Main Menu</div>
        <a href="/admin/dashboard" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <div class="nav-icon">📊</div> Dashboard
        </a>
        <a href="/admin/appointments" class="{{ request()->is('admin/appointments') ? 'active' : '' }}">
            <div class="nav-icon">📅</div> Appointments
        </a>
        <a href="/admin/patients" class="{{ request()->is('admin/patients') ? 'active' : '' }}">
            <div class="nav-icon">🧑‍🤝‍🧑</div> Patients
        </a>
        <a href="/admin/staff" class="{{ request()->is('admin/staff') ? 'active' : '' }}">
            <div class="nav-icon">👩‍⚕️</div> Staff
        </a>
        <a href="/admin/reports" class="{{ request()->is('admin/reports') ? 'active' : '' }}">
            <div class="nav-icon">📝</div> Reports
        </a>
    </nav>
    <div class="sidebar-footer">
        <div class="admin-info">
            <div class="admin-avatar">👤</div>
            <div>
                <div class="admin-name">Administrator</div>
                <div class="admin-role">System Admin</div>
            </div>
        </div>
    </div>
</div>

<div class="main">

    <div class="topbar">
        <div class="topbar-left">
            <h3>Appointments</h3>
            <p>Schedule and manage all clinic appointments</p>
        </div>
        <div class="topbar-right">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="logout-btn">⎋ Logout</button>
            </form>
        </div>
    </div>

    <div class="content">

        <div class="page-header">
            <h2>Manage Appointments</h2>
            <p>Add, edit, approve, or cancel patient appointments</p>
        </div>

        @if(session('success'))
        <div class="alert alert-success">✓ {{ session('success') }}</div>
        @endif

        @if(session('error'))
        <div class="alert alert-error">⚠ {{ session('error') }}</div>
        @endif

        <!-- ADD APPOINTMENT FORM -->
        <div class="form-card">
            <div class="form-card-header">
                <h3>➕ New Appointment</h3>
                <p>Fill in the details to schedule a new appointment</p>
            </div>

            <form method="POST" action="/admin/appointments">
                @csrf

                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">Patient Name</label>
                        <input type="text" name="patient_name" placeholder="Full name" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" placeholder="email@example.com" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Gender</label>
                        <input type="text" name="gender" placeholder="Male / Female" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Contact Number</label>
                        <input type="text" name="contact" placeholder="+63 9XX XXX XXXX" required>
                    </div>
                    <div class="form-group" style="grid-column: span 2;">
                        <label class="form-label">Address</label>
                        <input type="text" name="address" placeholder="Complete address" required>
                    </div>
                </div>

                <div class="form-grid-2">
                    <div class="form-group">
                        <label class="form-label">Appointment Date</label>
                        <input type="date" name="date" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Assign Doctor</label>
                        <select name="doctor_id" required>
                            <option value="">Select Doctor</option>
                            @foreach($doctors as $d)
                            <option value="{{ $d->id }}">{{ $d->name }} ({{ $d->role }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                            <label class="form-label">Start Time</label>

                            <select name="start_time" id="start_time" class="form-control" required>
                                <option value="">Select Start Time</option>

                                @php
                                   $times = [
                                        '08:00','09:00','10:00','11:00',
                                        '12:00','13:00','14:00','15:00',
                                        '16:00','17:00'
                                      ];
                                
                                @endphp

                                @foreach($times as $time)

                                  @php
                                    $booked = false;

                                    foreach($appointments as $a)
                                        if(
                                            $a->doctor_id == request('doctor_id') &&
                                            $a->date == request('date') &&
                                            $a->start_time == $time
                                        ){
                                            $booked = true;
                                        }
                                    @endphp

                                    <option value="{{ $time }}" {{ $booked ? 'disabled' : '' }}>
                                        {{ date('h:i A', strtotime($time)) }}
                                        {{ $booked ? ' - Unavailable' : '' }}
                                    </option>

                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">End Time</label>

                            <select name="end_time" class="form-control" required>
                                <option value="">Select End Time</option>

                                @foreach($times as $time)
                                    <option value="{{ $time }}">
                                        {{ date('h:i A', strtotime($time)) }}
                                    </option>
                                @endforeach
                                
                            </select>
                        </div>
                    </div>

                <div class="form-actions">
                    <button type="submit" class="btn-primary">📅 Schedule Appointment</button>
                </div>

            </form>
        </div>

        <!-- APPOINTMENTS TABLE -->
        <div class="card">
            <div class="card-header">
                <div>
                    <h3>All Appointments</h3>
                    <p>Complete list of scheduled clinic visits</p>
                </div>
            </div>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Patient</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Doctor</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($appointments as $a)
                    <tr>
                        <td>
                            <div class="patient-cell">
                                <div class="patient-avatar">{{ strtoupper(substr($a->patient_name, 0, 1)) }}</div>
                                <div>
                                    <div class="patient-name">{{ $a->patient_name ?? $a->patient_name }}</div>
                                    <div class="patient-email">{{ $a->patient->email ?? $a->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($a->date)->format('M d, Y') }}</td>
                        <td>
                            <span class="time-text">
                                {{ \Carbon\Carbon::parse($a->start_time)->format('h:i A') }} –<br>
                                {{ \Carbon\Carbon::parse($a->end_time)->format('h:i A') }}
                            </span>
                        </td>
                        <td>
                            @if($a->status == 'Pending')
                                <span class="badge badge-pending">Pending</span>
                                <div class="action-row">
                                    <form class="status-form" method="POST" action="/admin/appointments/{{ $a->id }}/status/Approved">
                                        @csrf
                                        <button class="btn btn-approve">✓ Approve</button>
                                    </form>
                                    <form class="status-form" method="POST" action="/admin/appointments/{{ $a->id }}/status/Cancelled">
                                        @csrf
                                        <button class="btn btn-cancel-action">✕ Cancel</button>
                                    </form>
                                </div>
                            @elseif($a->status == 'Approved')
                                <span class="badge badge-approved">Approved</span>
                            @else
                                <span class="badge badge-cancelled">Cancelled</span>
                            @endif
                        </td>
                        <td>
                            <span class="doctor-text">👩‍⚕️ {{ optional($a->doctor)->name ?? 'N/A' }}</span>
                        </td>
                        <td>
                            <div class="action-row">
                                <a href="/admin/appointments/{{ $a->id }}/edit" class="btn btn-edit">✏ Edit</a>
                                <form class="status-form" method="POST" action="/admin/appointments/{{ $a->id }}/delete"
                                    onsubmit="return confirm('Are you sure you want to delete this appointment?')">
                                    @csrf
                                    <button class="btn btn-delete">🗑 Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

</body>
</html>