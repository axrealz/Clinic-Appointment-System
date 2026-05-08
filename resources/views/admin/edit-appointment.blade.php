<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Appointment — UHealth</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
    --navy: #0d1b2a; --blue: #2563eb; --blue-light: #3b82f6; --blue-pale: #eff6ff;
    --green: #059669; --green-pale: #ecfdf5; --amber: #d97706; --amber-pale: #fffbeb;
    --red: #dc2626; --red-pale: #fef2f2; --border: #e2e8f0; --bg: #f1f5f9;
    --white: #ffffff; --text: #0f172a; --text-muted: #64748b; --sidebar-w: 260px;
    --radius: 14px; --shadow-sm: 0 1px 3px rgba(0,0,0,0.08);
    --shadow: 0 4px 16px rgba(0,0,0,0.08), 0 1px 4px rgba(0,0,0,0.04);
    --shadow-lg: 0 10px 40px rgba(0,0,0,0.1);
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
.topbar-right { display: flex; align-items: center; gap: 10px; }
.btn-back { display: flex; align-items: center; gap: 6px; padding: 9px 16px; background: var(--bg); color: var(--text-muted); border: 1px solid var(--border); border-radius: 8px; font-size: 13px; font-weight: 600; cursor: pointer; text-decoration: none; font-family: inherit; transition: all 0.18s ease; }
.btn-back:hover { background: var(--border); color: var(--text); }
.logout-btn { display: flex; align-items: center; gap: 6px; padding: 9px 18px; background: var(--red-pale); color: var(--red); border: 1px solid #fecaca; border-radius: 8px; font-size: 13px; font-weight: 600; cursor: pointer; font-family: inherit; transition: all 0.2s ease; }
.logout-btn:hover { background: var(--red); color: white; border-color: var(--red); }

/* CONTENT */
.content { padding: 40px 32px; flex: 1; display: flex; justify-content: center; }
.form-container { width: 100%; max-width: 660px; }

/* PAGE HEADER */
.page-header { margin-bottom: 28px; }
.page-header h2 { font-size: 24px; font-weight: 800; letter-spacing: -0.5px; }
.page-header p { color: var(--text-muted); margin-top: 4px; }

/* PATIENT TAG */
.patient-tag {
    display: flex;
    align-items: center;
    gap: 14px;
    background: var(--white);
    border: 1px solid var(--border);
    border-radius: 12px;
    padding: 16px 20px;
    margin-bottom: 24px;
    box-shadow: var(--shadow-sm);
}

.patient-tag-avatar {
    width: 44px; height: 44px;
    background: var(--blue);
    color: white;
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 18px;
    font-weight: 700;
    flex-shrink: 0;
}

.patient-tag-name { font-size: 15px; font-weight: 700; }
.patient-tag-sub { font-size: 12px; color: var(--text-muted); margin-top: 2px; }

/* ERROR */
.error-box {
    background: var(--red-pale);
    border: 1px solid #fecaca;
    border-radius: 10px;
    padding: 14px 18px;
    margin-bottom: 20px;
    color: #991b1b;
    font-size: 13.5px;
}

.error-box div { margin-bottom: 4px; }
.error-box div:last-child { margin-bottom: 0; }

/* FORM CARD */
.form-card {
    background: var(--white);
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    border: 1px solid var(--border);
    overflow: hidden;
}

.form-section {
    padding: 24px 28px;
    border-bottom: 1px solid var(--border);
}

.form-section:last-child { border-bottom: none; }

.form-section-title {
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.7px;
    color: var(--text-muted);
    margin-bottom: 16px;
    display: flex;
    align-items: center;
    gap: 6px;
}

.form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
.form-full { grid-column: span 2; }
.form-group { display: flex; flex-direction: column; gap: 6px; }
.form-label { font-size: 12px; font-weight: 600; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px; }
.form-control {
    width: 100%;
    padding: 10px 14px;
    border: 1.5px solid var(--border);
    border-radius: 8px;
    font-size: 13.5px;
    font-family: inherit;
    color: var(--text);
    background: var(--white);
    transition: border-color 0.18s ease, box-shadow 0.18s ease;
    outline: none;
}
.form-control:focus { border-color: var(--blue); box-shadow: 0 0 0 3px rgba(37,99,235,0.1); }
select.form-control { cursor: pointer; }

/* FORM FOOTER */
.form-footer {
    padding: 20px 28px;
    background: #f8fafc;
    border-top: 1px solid var(--border);
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 10px;
}

.btn-secondary {
    padding: 10px 20px;
    background: var(--white);
    color: var(--text-muted);
    border: 1.5px solid var(--border);
    border-radius: 8px;
    font-size: 13.5px;
    font-weight: 600;
    cursor: pointer;
    font-family: inherit;
    text-decoration: none;
    transition: all 0.18s ease;
}

.btn-secondary:hover { background: var(--bg); color: var(--text); }

.btn-primary {
    padding: 10px 24px;
    background: var(--blue);
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 13.5px;
    font-weight: 700;
    cursor: pointer;
    font-family: inherit;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.btn-primary:hover { background: #1d4ed8; box-shadow: 0 4px 12px rgba(37,99,235,0.35); transform: translateY(-1px); }
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
            <h3>Edit Appointment</h3>
            <p>Modify appointment details below</p>
        </div>
        <div class="topbar-right">
            <a href="/admin/appointments" class="btn-back">← Back</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="logout-btn">⎋ Logout</button>
            </form>
        </div>
    </div>

    <div class="content">
        <div class="form-container">

            <div class="page-header">
                <h2>✏️ Edit Appointment</h2>
                <p>Update the patient and schedule information below</p>
            </div>

            <!-- PATIENT TAG -->
            <div class="patient-tag">
                <div class="patient-tag-avatar">{{ strtoupper(substr($appointment->patient_name, 0, 1)) }}</div>
                <div>
                    <div class="patient-tag-name">{{ $appointment->patient_name }}</div>
                    <div class="patient-tag-sub">Editing appointment #{{ $appointment->id }} · {{ \Carbon\Carbon::parse($appointment->date)->format('M d, Y') }}</div>
                </div>
            </div>

            <!-- ERRORS -->
            @if ($errors->any())
            <div class="error-box">
                @foreach ($errors->all() as $error)
                <div>⚠ {{ $error }}</div>
                @endforeach
            </div>
            @endif

            <!-- FORM -->
            <div class="form-card">

                <form method="POST" action="/admin/appointments/{{ $appointment->id }}/update">
                    @csrf

                    <!-- PATIENT INFO -->
                    <div class="form-section">
                        <div class="form-section-title">👤 Patient Information</div>
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="patient_name" class="form-control"
                                    value="{{ $appointment->patient_name }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ $appointment->email }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Gender</label>
                                <input type="text" name="gender" class="form-control"
                                    value="{{ $appointment->gender }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Contact Number</label>
                                <input type="text" name="contact" class="form-control"
                                    value="{{ $appointment->contact }}" required>
                            </div>
                            <div class="form-group form-full">
                                <label class="form-label">Address</label>
                                <input type="text" name="address" class="form-control"
                                    value="{{ $appointment->address }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- SCHEDULE INFO -->
                    <div class="form-section">
                        <div class="form-section-title">📅 Schedule Details</div>
                        <div class="form-grid">
                            <div class="form-group form-full">
                                <label class="form-label">Appointment Date</label>
                                <input type="date" name="date" class="form-control"
                                    value="{{ $appointment->date }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Start Time</label>
                                <input type="time" name="start_time" class="form-control"
                                    value="{{ $appointment->start_time }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">End Time</label>
                                <input type="time" name="end_time" class="form-control"
                                    value="{{ $appointment->end_time }}" required>
                            </div>
                            <div class="form-group form-full">
                                <label class="form-label">Assigned Doctor</label>
                                <select name="doctor_id" class="form-control" required>
                                    @foreach($doctors as $d)
                                    <option value="{{ $d->id }}"
                                        {{ $appointment->doctor_id == $d->id ? 'selected' : '' }}>
                                        {{ $d->name }} ({{ $d->role }})
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- FOOTER ACTIONS -->
                    <div class="form-footer">
                        <a href="/admin/appointments" class="btn-secondary">Cancel</a>
                        <button type="submit" class="btn-primary">💾 Save Changes</button>
                    </div>

                </form>
            </div>

        </div>
    </div>

</div>

</body>
</html>