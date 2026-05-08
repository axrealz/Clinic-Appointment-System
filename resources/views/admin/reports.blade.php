<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reports — UHealth</title>
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
.logout-btn { display: flex; align-items: center; gap: 6px; padding: 9px 18px; background: var(--red-pale); color: var(--red); border: 1px solid #fecaca; border-radius: 8px; font-size: 13px; font-weight: 600; cursor: pointer; font-family: inherit; transition: all 0.2s ease; }
.logout-btn:hover { background: var(--red); color: white; border-color: var(--red); }

/* CONTENT */
.content { padding: 32px; flex: 1; }
.page-header { margin-bottom: 32px; }
.page-header h2 { font-size: 24px; font-weight: 800; letter-spacing: -0.5px; }
.page-header p { color: var(--text-muted); margin-top: 4px; }

/* REPORT CARDS GRID */
.report-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; max-width: 900px; }

/* REPORT CARD */
.report-card {
    background: var(--white);
    border-radius: var(--radius);
    padding: 28px;
    box-shadow: var(--shadow);
    border: 1px solid var(--border);
    display: flex;
    align-items: center;
    gap: 20px;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    position: relative;
    overflow: hidden;
}

.report-card::after {
    content: '';
    position: absolute;
    bottom: 0; left: 0; right: 0;
    height: 3px;
}

.report-card.blue::after { background: linear-gradient(90deg, var(--blue), var(--blue-light)); }
.report-card.green::after { background: linear-gradient(90deg, var(--green), #34d399); }
.report-card.amber::after { background: linear-gradient(90deg, var(--amber), #fbbf24); }
.report-card.red::after { background: linear-gradient(90deg, var(--red), #f87171); }

.report-card:hover { transform: translateY(-3px); box-shadow: var(--shadow-lg); }

.report-icon-wrap {
    width: 64px; height: 64px;
    border-radius: 16px;
    display: flex; align-items: center; justify-content: center;
    font-size: 28px;
    flex-shrink: 0;
}

.report-card.blue .report-icon-wrap { background: var(--blue-pale); }
.report-card.green .report-icon-wrap { background: var(--green-pale); }
.report-card.amber .report-icon-wrap { background: var(--amber-pale); }
.report-card.red .report-icon-wrap { background: var(--red-pale); }

.report-info {}
.report-label {
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.7px;
    color: var(--text-muted);
    margin-bottom: 8px;
}

.report-value {
    font-size: 42px;
    font-weight: 800;
    letter-spacing: -2px;
    line-height: 1;
}

.report-card.blue .report-value { color: var(--blue); }
.report-card.green .report-value { color: var(--green); }
.report-card.amber .report-value { color: var(--amber); }
.report-card.red .report-value { color: var(--red); }

.report-desc {
    font-size: 12.5px;
    color: var(--text-muted);
    margin-top: 6px;
}

/* SUMMARY SECTION */
.summary-section {
    margin-top: 40px;
    max-width: 900px;
}

.summary-section h3 {
    font-size: 16px;
    font-weight: 700;
    margin-bottom: 16px;
    color: var(--text);
}

.summary-card {
    background: var(--white);
    border-radius: var(--radius);
    border: 1px solid var(--border);
    box-shadow: var(--shadow);
    padding: 24px;
}

.summary-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 0;
    border-bottom: 1px solid #f1f5f9;
}

.summary-row:last-child { border-bottom: none; }

.summary-label { font-size: 14px; color: var(--text); font-weight: 500; display: flex; align-items: center; gap: 8px; }
.summary-bar-wrap { flex: 1; margin: 0 20px; height: 8px; background: #f1f5f9; border-radius: 20px; overflow: hidden; }
.summary-bar { height: 100%; border-radius: 20px; transition: width 0.6s ease; }
.bar-blue { background: var(--blue); }
.bar-green { background: var(--green); }
.bar-amber { background: var(--amber); }
.bar-red { background: var(--red); }
.summary-num { font-size: 15px; font-weight: 700; min-width: 30px; text-align: right; }
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
            <h3>Reports</h3>
            <p>Clinic statistics and appointment analytics</p>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="logout-btn">⎋ Logout</button>
        </form>
    </div>

    <div class="content">

        <div class="page-header">
            <h2>Reports Overview</h2>
            <p>Key metrics and appointment status breakdown</p>
        </div>

        <div class="report-grid">

            <div class="report-card blue">
                <div class="report-icon-wrap">🧑‍🤝‍🧑</div>
                <div class="report-info">
                    <div class="report-label">Total Patients</div>
                    <div class="report-value">{{ $totalPatients }}</div>
                    <div class="report-desc">Registered in system</div>
                </div>
            </div>

            <div class="report-card green">
                <div class="report-icon-wrap">📅</div>
                <div class="report-info">
                    <div class="report-label">Total Appointments</div>
                    <div class="report-value">{{ $totalAppointments }}</div>
                    <div class="report-desc">All time scheduled</div>
                </div>
            </div>

            <div class="report-card amber">
                <div class="report-icon-wrap">⏳</div>
                <div class="report-info">
                    <div class="report-label">Pending</div>
                    <div class="report-value">{{ $pending }}</div>
                    <div class="report-desc">Awaiting approval</div>
                </div>
            </div>

            <div class="report-card red">
                <div class="report-icon-wrap">✕</div>
                <div class="report-info">
                    <div class="report-label">Cancelled</div>
                    <div class="report-value">{{ $cancelled ?? 0 }}</div>
                    <div class="report-desc">Cancelled appointments</div>
                </div>
            </div>

        </div>

        <!-- BREAKDOWN BAR SUMMARY -->
        @php
            $total = max($totalAppointments, 1);
            $approvedPct = round(($approved / $total) * 100);
            $pendingPct = round(($pending / $total) * 100);
            $cancelledPct = round((($cancelled ?? 0) / $total) * 100);
        @endphp

        <div class="summary-section">
            <h3>Appointment Status Breakdown</h3>
            <div class="summary-card">
                <div class="summary-row">
                    <div class="summary-label">✅ Approved</div>
                    <div class="summary-bar-wrap">
                        <div class="summary-bar bar-green" style="width: {{ $approvedPct }}%;"></div>
                    </div>
                    <div class="summary-num" style="color: var(--green);">{{ $approved }}</div>
                </div>
                <div class="summary-row">
                    <div class="summary-label">⏳ Pending</div>
                    <div class="summary-bar-wrap">
                        <div class="summary-bar bar-amber" style="width: {{ $pendingPct }}%;"></div>
                    </div>
                    <div class="summary-num" style="color: var(--amber);">{{ $pending }}</div>
                </div>
                <div class="summary-row">
                    <div class="summary-label">✕ Cancelled</div>
                    <div class="summary-bar-wrap">
                        <div class="summary-bar bar-red" style="width: {{ $cancelledPct }}%;"></div>
                    </div>
                    <div class="summary-num" style="color: var(--red);">{{ $cancelled ?? 0 }}</div>
                </div>
            </div>
        </div>

    </div>
</div>

</body>
</html>