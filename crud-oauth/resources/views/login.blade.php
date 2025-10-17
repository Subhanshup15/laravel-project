<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Login</h2>
    <form id="loginForm">
        @csrf
        <div class="mb-3">
            <label>Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" class="form-control" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <div id="message" class="mt-3"></div>
    <a href="/register">Don't have an account? Register</a>
</div>

<script>
document.getElementById('loginForm').addEventListener('submit', async function(e){
    e.preventDefault();
    const formData = Object.fromEntries(new FormData(this).entries());

    try {
        const res = await fetch('/api/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(formData)
        });

        const result = await res.json();
        const msgDiv = document.getElementById('message');

        if(res.ok){
            localStorage.setItem('token', result.token);
            msgDiv.innerHTML = `<div class="alert alert-success">${result.message}</div>`;
            setTimeout(() => window.location.href = '/dashboard', 500);
        } else {
            msgDiv.innerHTML = `<div class="alert alert-danger">${result.message}</div>`;
        }
    } catch(err){
        document.getElementById('message').innerHTML = `<div class="alert alert-danger">Something went wrong</div>`;
    }
});
</script>
</body>
</html>
