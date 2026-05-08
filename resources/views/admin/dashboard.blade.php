<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard — UHealth</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
/* ═══════════════════════════════════
   RESET & BASE
═══════════════════════════════════ */
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
    --slate:      #64748b;
    --border:     #e2e8f0;
    --bg:         #f1f5f9;
    --white:      #ffffff;
    --text:       #0f172a;
    --text-muted: #64748b;
    --sidebar-w:  260px;
    --radius:     14px;
    --shadow-sm:  0 1px 3px rgba(0,0,0,0.08), 0 1px 2px rgba(0,0,0,0.04);
    --shadow:     0 4px 16px rgba(0,0,0,0.08), 0 1px 4px rgba(0,0,0,0.04);
    --shadow-lg:  0 10px 40px rgba(0,0,0,0.1), 0 2px 8px rgba(0,0,0,0.06);
}

body {
    font-family: 'Plus Jakarta Sans', sans-serif;
    background: var(--bg);
    color: var(--text);
    display: flex;
    min-height: 100vh;
    font-size: 14px;
    line-height: 1.5;
}

/* ═══════════════════════════════════
   SIDEBAR
═══════════════════════════════════ */
.sidebar {
    width: var(--sidebar-w);
    min-height: 100vh;
    background: var(--navy);
    display: flex;
    flex-direction: column;
    padding: 0;
    position: fixed;
    top: 0; left: 0;
    z-index: 100;
    box-shadow: 4px 0 24px rgba(0,0,0,0.15);
}

.sidebar-logo {
    padding: 28px 24px 24px;
    border-bottom: 1px solid rgba(255,255,255,0.07);
    display: flex;
    align-items: center;
    gap: 12px;
}

.sidebar-logo .logo-icon {
    width: 40px; height: 40px;
    background: var(--blue);
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 20px;
    flex-shrink: 0;
}

.sidebar-logo .logo-text {
    font-size: 20px;
    font-weight: 800;
    color: var(--white);
    letter-spacing: -0.5px;
}

.sidebar-logo .logo-text span {
    color: var(--blue-light);
}

.sidebar-nav {
    padding: 20px 16px;
    flex: 1;
}

.nav-label {
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 1.2px;
    text-transform: uppercase;
    color: rgba(255,255,255,0.3);
    padding: 0 12px;
    margin-bottom: 8px;
    margin-top: 16px;
}

.nav-label:first-child { margin-top: 0; }

.sidebar-nav a {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 11px 14px;
    border-radius: 10px;
    color: rgba(255,255,255,0.6);
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    transition: all 0.2s ease;
    margin-bottom: 2px;
}

.sidebar-nav a .nav-icon {
    width: 36px; height: 36px;
    border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    font-size: 16px;
    background: rgba(255,255,255,0.05);
    flex-shrink: 0;
    transition: all 0.2s ease;
}

.sidebar-nav a:hover {
    background: rgba(255,255,255,0.07);
    color: var(--white);
}

.sidebar-nav a:hover .nav-icon {
    background: rgba(37,99,235,0.3);
}

.sidebar-nav a.active {
    background: var(--blue);
    color: var(--white);
    box-shadow: 0 4px 12px rgba(37,99,235,0.4);
}

.sidebar-nav a.active .nav-icon {
    background: rgba(255,255,255,0.2);
}

.sidebar-footer {
    padding: 16px;
    border-top: 1px solid rgba(255,255,255,0.07);
}

.sidebar-footer .admin-info {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 12px;
    border-radius: 10px;
    background: rgba(255,255,255,0.05);
}

.admin-avatar {
    width: 34px; height: 34px;
    background: var(--blue);
    border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    font-size: 15px;
    flex-shrink: 0;
}

.admin-name { font-size: 13px; font-weight: 600; color: var(--white); }
.admin-role { font-size: 11px; color: rgba(255,255,255,0.4); }

/* ═══════════════════════════════════
   MAIN CONTENT
═══════════════════════════════════ */
.main {
    flex: 1;
    margin-left: var(--sidebar-w);
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

/* ═══════════════════════════════════
   TOPBAR
═══════════════════════════════════ */
.topbar {
    background: var(--white);
    padding: 16px 32px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid var(--border);
    position: sticky; top: 0; z-index: 50;
    box-shadow: var(--shadow-sm);
}

.topbar-left h3 {
    font-size: 18px;
    font-weight: 700;
    color: var(--text);
}

.topbar-left p {
    font-size: 12px;
    color: var(--text-muted);
    margin-top: 1px;
}

.topbar-right {
    display: flex;
    align-items: center;
    gap: 16px;
}

.topbar-badge {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 8px 14px;
    background: var(--bg);
    border-radius: 20px;
    border: 1px solid var(--border);
    font-size: 13px;
    font-weight: 500;
    color: var(--text);
}

.logout-form { margin: 0; }

.logout-btn {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 9px 18px;
    background: var(--red-pale);
    color: var(--red);
    border: 1px solid #fecaca;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    font-family: inherit;
    transition: all 0.2s ease;
}

.logout-btn:hover {
    background: var(--red);
    color: white;
    border-color: var(--red);
}

/* ═══════════════════════════════════
   CONTENT
═══════════════════════════════════ */
.content {
    padding: 32px;
    flex: 1;
}

.page-header {
    margin-bottom: 28px;
}

.page-header h2 {
    font-size: 24px;
    font-weight: 800;
    color: var(--text);
    letter-spacing: -0.5px;
}

.page-header p {
    color: var(--text-muted);
    margin-top: 4px;
    font-size: 14px;
}

/* ═══════════════════════════════════
   STAT CARDS
═══════════════════════════════════ */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    margin-bottom: 32px;
}

.stat-card {
    background: var(--white);
    border-radius: var(--radius);
    padding: 24px;
    box-shadow: var(--shadow);
    display: flex;
    align-items: center;
    gap: 18px;
    border: 1px solid var(--border);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    position: relative;
    overflow: hidden;
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0;
    width: 4px; height: 100%;
}

.stat-card.blue::before { background: var(--blue); }
.stat-card.green::before { background: var(--green); }
.stat-card.amber::before { background: var(--amber); }

.stat-card:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

.stat-icon {
    width: 52px; height: 52px;
    border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    font-size: 22px;
    flex-shrink: 0;
}

.stat-card.blue .stat-icon { background: var(--blue-pale); }
.stat-card.green .stat-icon { background: var(--green-pale); }
.stat-card.amber .stat-icon { background: var(--amber-pale); }

.stat-info { flex: 1; }

.stat-label {
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.7px;
    color: var(--text-muted);
    margin-bottom: 6px;
}

.stat-value {
    font-size: 32px;
    font-weight: 800;
    color: var(--text);
    letter-spacing: -1px;
    line-height: 1;
}

.stat-sub {
    font-size: 12px;
    color: var(--text-muted);
    margin-top: 4px;
}

/* ═══════════════════════════════════
   TABLE CARD
═══════════════════════════════════ */
.card {
    background: var(--white);
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    border: 1px solid var(--border);
    overflow: hidden;
}

.card-header {
    padding: 20px 24px;
    border-bottom: 1px solid var(--border);
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.card-header h3 {
    font-size: 16px;
    font-weight: 700;
    color: var(--text);
}

.card-header p { font-size: 13px; color: var(--text-muted); margin-top: 2px; }

.badge-count {
    background: var(--blue-pale);
    color: var(--blue);
    font-size: 12px;
    font-weight: 700;
    padding: 4px 10px;
    border-radius: 20px;
}

/* ═══════════════════════════════════
   TABLE
═══════════════════════════════════ */
.table-wrap { overflow-x: auto; }

table {
    width: 100%;
    border-collapse: collapse;
}

table thead tr {
    background: #f8fafc;
    border-bottom: 1px solid var(--border);
}

table th {
    padding: 12px 20px;
    text-align: left;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.8px;
    text-transform: uppercase;
    color: var(--text-muted);
    white-space: nowrap;
}

table td {
    padding: 14px 20px;
    border-bottom: 1px solid #f1f5f9;
    font-size: 13.5px;
    color: var(--text);
    vertical-align: middle;
}

table tbody tr:last-child td { border-bottom: none; }

table tbody tr {
    transition: background 0.15s ease;
}

table tbody tr:hover { background: #f8fafc; }

.patient-cell {
    display: flex;
    align-items: center;
    gap: 10px;
}

.patient-avatar {
    width: 32px; height: 32px;
    border-radius: 8px;
    background: var(--blue-pale);
    color: var(--blue);
    display: flex; align-items: center; justify-content: center;
    font-size: 13px;
    font-weight: 700;
    flex-shrink: 0;
}

.patient-name { font-weight: 600; font-size: 13.5px; }
.patient-email { font-size: 12px; color: var(--text-muted); }

/* ═══════════════════════════════════
   BADGES
═══════════════════════════════════ */
.badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 11.5px;
    font-weight: 700;
    letter-spacing: 0.3px;
    white-space: nowrap;
}

.badge::before {
    content: '';
    width: 6px; height: 6px;
    border-radius: 50%;
}

.badge-pending {
    background: var(--amber-pale);
    color: #92400e;
    border: 1px solid #fde68a;
}
.badge-pending::before { background: var(--amber); }

.badge-approved {
    background: var(--green-pale);
    color: #065f46;
    border: 1px solid #a7f3d0;
}
.badge-approved::before { background: var(--green); }

.badge-cancelled {
    background: var(--red-pale);
    color: #991b1b;
    border: 1px solid #fecaca;
}
.badge-cancelled::before { background: var(--red); }

/* ═══════════════════════════════════
   ACTION BUTTONS (inline in table)
═══════════════════════════════════ */
.action-group {
    display: flex;
    align-items: center;
    gap: 6px;
    flex-wrap: wrap;
}

.btn {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 6px 12px;
    border-radius: 7px;
    font-size: 12px;
    font-weight: 600;
    border: none;
    cursor: pointer;
    text-decoration: none;
    font-family: inherit;
    transition: all 0.18s ease;
    white-space: nowrap;
}

.btn-approve {
    background: var(--green-pale);
    color: #065f46;
    border: 1px solid #a7f3d0;
}
.btn-approve:hover { background: var(--green); color: white; border-color: var(--green); }

.btn-cancel {
    background: var(--red-pale);
    color: var(--red);
    border: 1px solid #fecaca;
}
.btn-cancel:hover { background: var(--red); color: white; border-color: var(--red); }

.status-form { display: inline; margin: 0; }

.doctor-chip {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 12.5px;
    color: var(--text-muted);
}

.time-chip {
    font-size: 12.5px;
    color: var(--text-muted);
    font-variant-numeric: tabular-nums;
}
</style>
</head>

<body>

<!-- ═══ SIDEBAR ═══ -->
<div class="sidebar">
    <div class="sidebar-logo">
        <div class="logo-icon">🏥</div>
        <div class="logo-text">U<span>Health</span></div>
    </div>

    <nav class="sidebar-nav">
        <div class="nav-label">Main Menu</div>

        <a href="/admin/dashboard" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <div class="nav-icon">📊</div>
            Dashboard
        </a>

        <a href="/admin/appointments" class="{{ request()->is('admin/appointments') ? 'active' : '' }}">
            <div class="nav-icon">📅</div>
            Appointments
        </a>

        <a href="/admin/patients" class="{{ request()->is('admin/patients') ? 'active' : '' }}">
            <div class="nav-icon">🧑‍🤝‍🧑</div>
            Patients
        </a>

        <a href="/admin/staff" class="{{ request()->is('admin/staff') ? 'active' : '' }}">
            <div class="nav-icon">👩‍⚕️</div>
            Staff
        </a>

        <a href="/admin/reports" class="{{ request()->is('admin/reports') ? 'active' : '' }}">
            <div class="nav-icon">📝</div>
            Reports
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

<!-- ═══ MAIN ═══ -->
<div class="main">

    <!-- TOPBAR -->
    <div class="topbar">
        <div class="topbar-left">
            <h3>Dashboard</h3>
            <p>Welcome back — here's what's happening today.</p>
        </div>
        <div class="topbar-right">
            <div class="topbar-badge">🗓️ {{ now()->format('M d, Y') }}</div>
            <form class="logout-form" method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="logout-btn">⎋ Logout</button>
            </form>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="content">

        <div class="page-header">
            <h2>Welcome back, Admin 👋</h2>
            <p>Here's an overview of your clinic's activity.</p>
        </div>

        <!-- STAT CARDS -->
        <div class="stats-grid">
            <div class="stat-card blue">
                <div class="stat-icon">🧑‍🤝‍🧑</div>
                <div class="stat-info">
                    <div class="stat-label">Total Patients</div>
                    <div class="stat-value">{{ $totalPatients }}</div>
                    <div class="stat-sub">Registered in system</div>
                </div>
            </div>

            <div class="stat-card green">
                <div class="stat-icon">📅</div>
                <div class="stat-info">
                    <div class="stat-label">Appointments</div>
                    <div class="stat-value">{{ $totalAppointments }}</div>
                    <div class="stat-sub">Total scheduled</div>
                </div>
            </div>

            <div class="stat-card amber">
                <div class="stat-icon">👩‍⚕️</div>
                <div class="stat-info">
                    <div class="stat-label">Staff Members</div>
                    <div class="stat-value">{{ $totalStaff }}</div>
                    <div class="stat-sub">Active personnel</div>
                </div>
            </div>
        </div>

        <!-- RECENT APPOINTMENTS TABLE -->
        <div class="card">
            <div class="card-header">
                <div>
                    <h3>Recent Appointments</h3>
                    <p>Latest scheduled visits across all doctors</p>
                </div>
                <a href="/admin/appointments" class="badge-count">View All →</a>
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
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($appointments as $a)
                    <tr>
                        <td>
                            <div class="patient-cell">
                                <div class="patient-avatar">{{ strtoupper(substr($a->patient_name, 0, 1)) }}</div>
                                <div>
                                    <div class="patient-name">{{ $a->patient_name }}</div>
                                    <div class="patient-email">{{ $a->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($a->date)->format('M d, Y') }}</td>
                        <td>
                            <span class="time-chip">{{ \Carbon\Carbon::parse($a->start_time)->format('h:i A') }} – {{ \Carbon\Carbon::parse($a->end_time)->format('h:i A') }}</span>
                        </td>
                        <td>
                            @if($a->status == 'Pending')
                                <span class="badge badge-pending">Pending</span>
                                <div class="action-group" style="margin-top:6px;">
                                    <form class="status-form" method="POST" action="/admin/appointments/{{ $a->id }}/status/Approved">
                                        @csrf
                                        <button class="btn btn-approve">✓ Approve</button>
                                    </form>
                                    <form class="status-form" method="POST" action="/admin/appointments/{{ $a->id }}/status/Cancelled">
                                        @csrf
                                        <button class="btn btn-cancel">✕ Cancel</button>
                                    </form>
                                </div>
                            @elseif($a->status == 'Approved')
                                <span class="badge badge-approved">Approved</span>
                            @else
                                <span class="badge badge-cancelled">Cancelled</span>
                            @endif
                        </td>
                        <td>
                            <span class="doctor-chip">👩‍⚕️ {{ optional($a->doctor)->name ?? 'N/A' }}</span>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div><!-- /content -->
</div><!-- /main -->

</body>
</html>