<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>UHealth Login</title>

<style>
body {
    margin: 0;
    font-family: 'Inter', sans-serif;
    background: linear-gradient(135deg, #1e3a8a, #F2F0EF);
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* LOGIN CARD */
.login-box {
    width: 380px;
    background: white;
    padding: 35px;
    border-radius: 15px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.2);
    text-align: center;
}

/* TITLE */
.login-box h1 {
    margin-bottom: 5px;
    color: #1e293b;
}

.login-box p {
    color: #64748b;
    margin-bottom: 25px;
    font-size: 14px;
}

/* INPUTS */
.input-group {
    text-align: left;
    margin-bottom: 15px;
}

.input-group label {
    font-size: 13px;
    color: #334155;
}

.input-group input {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border-radius: 6px;
    border: 1px solid #cbd5e1;
}

/* BUTTON */
.login-btn {
    width: 100%;
    padding: 10px;
    background: #2563eb;
    color: white;
    border: none;
    border-radius: 6px;
    margin-top: 15px;
    cursor: pointer;
    transition: 0.2s;
}

.login-btn:hover {
    background: #1d4ed8;
}

/* ALERTS */
.alert {
    padding: 10px;
    border-radius: 6px;
    margin-bottom: 10px;
    font-size: 13px;
}

.alert-error {
    background: #ef4444;
    color: white;
}

.alert-success {
    background: #22c55e;
    color: white;
}

</style>
</head>

<body>

<div class="login-box">

    <h1>UHealth</h1>
    <p>Login to your account</p>

    <!-- ERROR -->
    @if(session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif

    <!-- SUCCESS -->
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>

        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <button type="submit" class="login-btn">Login</button>
    </form>

</div>

</body>
</html>