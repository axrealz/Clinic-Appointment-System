<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Staff — UHealth</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
    --navy: #0d1b2a; --blue: #2563eb; --blue-light: #3b82f6; --blue-pale: #eff6ff;
    --green: #059669; --green-pale: #ecfdf5; --amber: #d97706; --amber-pale: #fffbeb;
    --red: #dc2626; --red-pale: #fef2f2; --purple-pale: #f5f3ff; --purple: #7c3aed;
    --border: #e2e8f0; --bg: #f1f5f9; --white: #ffffff; --text: #0f172a; --text-muted: #64748b;
    --sidebar-w: 260px; --radius: 14px;
    --shadow-sm: 0 1px 3px rgba(0,0,0,0.08);
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
.content { padding: 32px; }
.page-header { margin-bottom: 28px; }
.page-header h2 { font-size: 24px; font-weight: 800; letter-spacing: -0.5px; }
.page-header p { color: var(--text-muted); margin-top: 4px; }

/* CARD */
.card { background: var(--white); border-radius: var(--radius); box-shadow: var(--shadow); border: 1px solid var(--border); overflow: hidden; }
.card-header { padding: 20px 24px; border-bottom: 1px solid var(--border); display: flex; align-items: center; justify-content: space-between; }
.card-header h3 { font-size: 16px; font-weight: 700; }
.card-header p { font-size: 13px; color: var(--text-muted); margin-top: 2px; }

/* TABLE */
.table-wrap { overflow-x: auto; }
table { width: 100%; border-collapse: collapse; }
thead tr { background: #f8fafc; border-bottom: 1px solid var(--border); }
th { padding: 12px 20px; text-align: left; font-size: 11px; font-weight: 700; letter-spacing: 0.8px; text-transform: uppercase; color: var(--text-muted); white-space: nowrap; }
td { padding: 14px 20px; border-bottom: 1px solid #f1f5f9; font-size: 13.5px; vertical-align: middle; }
tbody tr:last-child td { border-bottom: none; }
tbody tr { transition: background 0.15s ease; }
tbody tr:hover { background: #f8fafc; }

/* STAFF CELL */
.staff-cell { display: flex; align-items: center; gap: 12px; }
.staff-avatar { width: 38px; height: 38px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 15px; font-weight: 700; flex-shrink: 0; color: white; }
.staff-name { font-weight: 600; }
.staff-id { font-size: 11.5px; color: var(--text-muted); }

/* ROLE BADGES */
.role-badge { display: inline-flex; align-items: center; gap: 5px; padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; white-space: nowrap; }
.role-doctor { background: var(--blue-pale); color: #1d4ed8; border: 1px solid #bfdbfe; }
.role-nurse { background: var(--green-pale); color: #065f46; border: 1px solid #a7f3d0; }
.role-admin { background: var(--purple-pale); color: var(--purple); border: 1px solid #ddd6fe; }
.role-other { background: var(--amber-pale); color: #92400e; border: 1px solid #fde68a; }

.gender-badge { display: inline-flex; padding: 3px 10px; border-radius: 20px; font-size: 11.5px; font-weight: 600; }
.gender-m { background: #eff6ff; color: #1d4ed8; }
.gender-f { background: #fdf2f8; color: #9d174d; }
.gender-o { background: #f0fdf4; color: #166534; }

.contact-text { font-size: 13px; color: var(--text-muted); }
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
            <h3>Staff</h3>
            <p>Clinic staff directory and roles</p>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="logout-btn">⎋ Logout</button>
        </form>
    </div>

    <div class="content">

        <div class="page-header">
            <h2>Clinic Staff</h2>
            <p>View all medical and administrative personnel</p>
        </div>

        <div class="card">
            <div class="card-header">
                <div>
                    <h3>All Staff Members</h3>
                    <p>Doctors, nurses, and administrative staff</p>
                </div>
            </div>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Gender</th>
                            <th>Contact</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($staff as $s)
                    <tr>
                        <td>
                            <div class="staff-cell">
                                @php
                                    $colors = ['#2563eb','#059669','#7c3aed','#d97706','#dc2626'];
                                    $color = $colors[crc32($s->name) % count($colors)];
                                @endphp
                                <div class="staff-avatar" style="background: {{ $color }};">
                                    {{ strtoupper(substr($s->name, 0, 1)) }}
                                </div>
                                <div>
                                    <div class="staff-name">{{ $s->name }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            @php $role = strtolower($s->role ?? ''); @endphp
                            <span class="role-badge {{ str_contains($role,'doctor') || str_contains($role,'dr') ? 'role-doctor' : (str_contains($role,'nurse') ? 'role-nurse' : (str_contains($role,'admin') ? 'role-admin' : 'role-other')) }}">
                                {{ str_contains($role,'doctor') || str_contains($role,'dr') ? '🩺' : (str_contains($role,'nurse') ? '💉' : (str_contains($role,'admin') ? '🖥️' : '👤')) }}
                                {{ $s->role }}
                            </span>
                        </td>
                        <td>
                            @php $g = strtolower($s->gender ?? ''); @endphp
                            <span class="gender-badge {{ $g === 'male' ? 'gender-m' : ($g === 'female' ? 'gender-f' : 'gender-o') }}">
                                {{ $s->gender ?? '-' }}
                            </span>
                        </td>
                        <td>
                            <span class="contact-text">{{ $s->contact ?? '-' }}</span>
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