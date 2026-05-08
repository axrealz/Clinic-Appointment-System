<!DOCTYPE html>
<html>
<head>
    <title>Clinic Admin</title>

<style>
body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    display: flex;
    background: #f4f6f9;
}

/* SIDEBAR */
.sidebar {
    width: 230px;
    height: 100vh;
    background: #1e293b;
    color: white;
    padding: 20px;
}

.sidebar h2 {
    margin-bottom: 30px;
}

.sidebar a {
    display: block;
    color: #cbd5e1;
    text-decoration: none;
    margin: 12px 0;
    transition: 0.3s;
}

.sidebar a:hover {
    color: white;
    padding-left: 5px;
}

/* MAIN */
.main {
    flex: 1;
}

/* TOPBAR */
.topbar {
    background: white;
    padding: 15px 25px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 2px 5px rgba(0,0,0,0.08);
}

/* CONTENT */
.content {
    padding: 30px;
}

/* BUTTON */
.btn {
    padding: 6px 12px;
    border-radius: 5px;
    border: none;
    cursor: pointer;
}

.btn-green { background: #22c55e; color: white; }
.btn-red { background: #ef4444; color: white; }
.btn-blue { background: #3b82f6; color: white; }

table {
    width: 100%;
    background: white;
    border-collapse: collapse;
    border-radius: 10px;
    overflow: hidden;
}

th {
    background: #1e293b;
    color: white;
    padding: 12px;
}

td {
    padding: 12px;
    border-bottom: 1px solid #eee;
}
</style>

</head>

<body>

<div class="sidebar">
    <h2>Clinic Admin</h2>

    <a href="/admin/dashboard">Dashboard</a>
    <a href="/admin/appointments">Appointments</a>
    <a href="/admin/patients">Patients</a>
    <a href="/admin/staff">Staff</a>
</div>

<div class="main">

<div class="topbar">
    <h3>@yield('title')</h3>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-red">Logout</button>
    </form>
</div>

<div class="content">
    @yield('content')
</div>

</div>

</body>
</html>