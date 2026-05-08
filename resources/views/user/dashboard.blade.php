<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Book Appointment — UHealth</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
    --navy:       #0d1b2a;
    --blue:       #2563eb;
    --blue-light: #3b82f6;
    --blue-pale:  #eff6ff;
    --green:      #059669;
    --green-pale: #ecfdf5;
    --red:        #dc2626;
    --red-pale:   #fef2f2;
    --border:     #e2e8f0;
    --bg:         #f1f5f9;
    --white:      #ffffff;
    --text:       #0f172a;
    --text-muted: #64748b;
    --sidebar-w:  240px;
    --radius:     14px;
    --shadow-sm:  0 1px 3px rgba(0,0,0,0.08);
    --shadow:     0 4px 16px rgba(0,0,0,0.08), 0 1px 4px rgba(0,0,0,0.04);
    --shadow-lg:  0 20px 60px rgba(0,0,0,0.1);
}

body {
    font-family: 'Plus Jakarta Sans', sans-serif;
    background: var(--bg);
    color: var(--text);
    display: flex;
    min-height: 100vh;
    font-size: 14px;
}

/* ─── SIDEBAR ─── */
.sidebar {
    width: var(--sidebar-w);
    min-height: 100vh;
    background: var(--navy);
    display: flex;
    flex-direction: column;
    position: fixed;
    top: 0; left: 0;
    z-index: 100;
    box-shadow: 4px 0 24px rgba(0,0,0,0.15);
}

.sidebar-logo {
    padding: 28px 24px 24px;
    border-bottom: 1px solid rgba(255,255,255,0.07);
    display: flex; align-items: center; gap: 12px;
}

.logo-icon {
    width: 40px; height: 40px; background: var(--blue);
    border-radius: 10px; display: flex; align-items: center;
    justify-content: center; font-size: 20px; flex-shrink: 0;
}

.logo-text { font-size: 20px; font-weight: 800; color: var(--white); letter-spacing: -0.5px; }
.logo-text span { color: var(--blue-light); }

.sidebar-nav { padding: 20px 16px; flex: 1; }

.nav-label {
    font-size: 10px; font-weight: 700; letter-spacing: 1.2px;
    text-transform: uppercase; color: rgba(255,255,255,0.3);
    padding: 0 12px; margin-bottom: 8px;
}

.sidebar-nav a {
    display: flex; align-items: center; gap: 12px;
    padding: 11px 14px; border-radius: 10px;
    color: rgba(255,255,255,0.6);
    text-decoration: none; font-size: 14px; font-weight: 500;
    transition: all 0.2s ease; margin-bottom: 2px;
}

.nav-icon {
    width: 36px; height: 36px; border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    font-size: 16px; background: rgba(255,255,255,0.05);
    flex-shrink: 0; transition: all 0.2s ease;
}

.sidebar-nav a:hover { background: rgba(255,255,255,0.07); color: var(--white); }
.sidebar-nav a:hover .nav-icon { background: rgba(37,99,235,0.3); }
.sidebar-nav a.active { background: var(--blue); color: var(--white); box-shadow: 0 4px 12px rgba(37,99,235,0.4); }
.sidebar-nav a.active .nav-icon { background: rgba(255,255,255,0.2); }

.sidebar-footer {
    padding: 16px;
    border-top: 1px solid rgba(255,255,255,0.07);
}

.user-info {
    display: flex; align-items: center; gap: 10px;
    padding: 10px 12px; border-radius: 10px;
    background: rgba(255,255,255,0.05);
}

.user-avatar {
    width: 34px; height: 34px; background: var(--blue);
    border-radius: 8px; display: flex; align-items: center;
    justify-content: center; font-size: 15px; flex-shrink: 0;
}

.user-name { font-size: 13px; font-weight: 600; color: var(--white); }
.user-role { font-size: 11px; color: rgba(255,255,255,0.4); }

/* ─── MAIN ─── */
.main {
    flex: 1;
    margin-left: var(--sidebar-w);
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

/* ─── TOPBAR ─── */
.topbar {
    background: var(--white); padding: 16px 32px;
    display: flex; justify-content: space-between; align-items: center;
    border-bottom: 1px solid var(--border);
    position: sticky; top: 0; z-index: 50; box-shadow: var(--shadow-sm);
}

.topbar-left h3 { font-size: 18px; font-weight: 700; }
.topbar-left p  { font-size: 12px; color: var(--text-muted); margin-top: 1px; }

.logout-btn {
    display: flex; align-items: center; gap: 6px;
    padding: 9px 18px; background: var(--red-pale); color: var(--red);
    border: 1px solid #fecaca; border-radius: 8px;
    font-size: 13px; font-weight: 600; cursor: pointer;
    font-family: inherit; transition: all 0.2s ease;
}
.logout-btn:hover { background: var(--red); color: white; border-color: var(--red); }

/* ─── CONTENT ─── */
.content {
    flex: 1;
    display: flex;
    align-items: flex-start;
    justify-content: center;
    padding: 48px 32px;
}

/* ─── FORM WRAPPER ─── */
.form-wrapper { width: 100%; max-width: 600px; }

/* HERO */
.form-hero {
    text-align: center;
    margin-bottom: 28px;
}

.form-hero .hero-icon {
    width: 64px; height: 64px;
    background: var(--blue-pale);
    border-radius: 18px;
    display: flex; align-items: center; justify-content: center;
    font-size: 28px;
    margin: 0 auto 16px;
    box-shadow: 0 4px 12px rgba(37,99,235,0.15);
}

.form-hero h2 { font-size: 24px; font-weight: 800; letter-spacing: -0.5px; }
.form-hero p  { color: var(--text-muted); margin-top: 6px; font-size: 14px; }

/* ALERTS */
.alert {
    padding: 14px 18px; border-radius: 10px;
    margin-bottom: 20px; font-size: 14px; font-weight: 500;
    display: flex; align-items: center; gap: 10px;
}
.alert-success { background: var(--green-pale); color: #065f46; border: 1px solid #a7f3d0; }
.alert-error   { background: var(--red-pale);   color: #991b1b; border: 1px solid #fecaca; }

/* FORM CARD */
.form-card {
    background: var(--white);
    border-radius: var(--radius);
    box-shadow: var(--shadow-lg);
    border: 1px solid var(--border);
    overflow: hidden;
}

.form-section {
    padding: 24px 28px;
    border-bottom: 1px solid var(--border);
}

.form-section:last-of-type { border-bottom: none; }

.section-title {
    font-size: 11px; font-weight: 700;
    text-transform: uppercase; letter-spacing: 0.8px;
    color: var(--text-muted); margin-bottom: 16px;
    display: flex; align-items: center; gap: 6px;
}

.form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
.form-full  { grid-column: span 2; }

.form-group { display: flex; flex-direction: column; gap: 5px; }
.form-label { font-size: 11.5px; font-weight: 700; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px; }

.form-control {
    width: 100%; padding: 11px 14px;
    border: 1.5px solid var(--border); border-radius: 9px;
    font-size: 13.5px; font-family: inherit; color: var(--text);
    background: var(--white); outline: none;
    transition: border-color 0.18s, box-shadow 0.18s;
}
.form-control:focus { border-color: var(--blue); box-shadow: 0 0 0 3px rgba(37,99,235,0.1); }
select.form-control { cursor: pointer; }
.form-control::placeholder { color: #94a3b8; }

/* TIME ROW */
.time-row { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }

/* SUBMIT FOOTER */
.form-submit {
    padding: 20px 28px;
    background: #fafbfc;
    border-top: 1px solid var(--border);
    display: flex; flex-direction: column; align-items: stretch; gap: 12px;
}

.btn-book {
    width: 100%; padding: 14px;
    background: var(--blue); color: white;
    border: none; border-radius: 10px;
    font-size: 15px; font-weight: 700; cursor: pointer;
    font-family: inherit; letter-spacing: 0.2px;
    transition: all 0.2s ease;
    display: flex; align-items: center; justify-content: center; gap: 8px;
}
.btn-book:hover { background: #1d4ed8; box-shadow: 0 6px 20px rgba(37,99,235,0.4); transform: translateY(-1px); }
.btn-book:active { transform: translateY(0); }

.form-note {
    text-align: center; font-size: 12px; color: var(--text-muted);
    display: flex; align-items: center; justify-content: center; gap: 5px;
}
</style>
</head>

<body>

<!-- ─── SIDEBAR ─── -->
<div class="sidebar">
    <div class="sidebar-logo">
        <div class="logo-icon">🏥</div>
        <div class="logo-text">U<span>Health</span></div>
    </div>

    <nav class="sidebar-nav">
        <div class="nav-label">Menu</div>
        <a href="/user/dashboard" class="active">
            <div class="nav-icon">📅</div>
            Book Appointment
        </a>
    </nav>

    <div class="sidebar-footer">
        <div class="user-info">
            <div class="user-avatar">👤</div>
            <div>
                <div class="user-name">Patient</div>
                <div class="user-role">Registered User</div>
            </div>
        </div>
    </div>
</div>

<!-- ─── MAIN ─── -->
<div class="main">

    <!-- TOPBAR -->
    <div class="topbar">
        <div class="topbar-left">
            <h3>Book Appointment</h3>
            <p>Schedule your clinic visit online</p>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="logout-btn">⎋ Logout</button>
        </form>
    </div>

    <!-- CONTENT -->
    <div class="content">
        <div class="form-wrapper">

            <!-- HERO -->
            <div class="form-hero">
                <div class="hero-icon">📅</div>
                <h2>Schedule Your Visit</h2>
                <p>Fill in your details below and we'll confirm your appointment</p>
            </div>

            <!-- ALERTS -->
            @if(session('success'))
            <div class="alert alert-success">✓ {{ session('success') }}</div>
            @endif

            @if(session('error'))
            <div class="alert alert-error">⚠ {{ session('error') }}</div>
            @endif

            <!-- FORM CARD -->
            <div class="form-card">
                <form method="POST" action="/user/book">
                    @csrf

                    <!-- PERSONAL INFO -->
                    <div class="form-section">
                        <div class="section-title">👤 Personal Information</div>
                        <div class="form-grid">
                            <div class="form-group form-full">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="patient_name" class="form-control" placeholder="Your full name" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control" placeholder="you@email.com" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Gender</label>
                                <select name="gender" class="form-control" required>
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Contact Number</label>
                                <input type="text" name="contact" class="form-control" placeholder="+63 9XX XXX XXXX" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Address</label>
                                <input type="text" name="address" class="form-control" placeholder="Your address" required>
                            </div>
                        </div>
                    </div>

                    <!-- SCHEDULE -->
                    <div class="form-section">
                        <div class="section-title">🗓️ Appointment Details</div>
                        <div class="form-grid">
                            <div class="form-group form-full">
                                <label class="form-label">Preferred Date</label>
                                <input type="date" name="date" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Start Time</label>
                                <input type="time" name="start_time" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">End Time</label>
                                <input type="time" name="end_time" class="form-control" required>
                            </div>
                            <div class="form-group form-full">
                                <label class="form-label">Preferred Doctor</label>
                                <select name="doctor_id" class="form-control" required>
                                    <option value="">Select a Doctor</option>
                                    @foreach($doctors as $d)
                                    <option value="{{ $d->id }}">{{ $d->name }} ({{ $d->role }})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- SUBMIT -->
                    <div class="form-submit">
                        <button type="submit" class="btn-book">📅 Book My Appointment</button>
                        <p class="form-note">🔒 Your information is kept private and secure</p>
                    </div>

                </form>
            </div><!-- /form-card -->

        </div><!-- /form-wrapper -->
    </div><!-- /content -->

</div><!-- /main -->

</body>
</html>