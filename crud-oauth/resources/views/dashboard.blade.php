<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">MyApp Dashboard</a>
        <button class="btn btn-outline-light ms-auto" id="logoutBtn">Logout</button>
    </div>
</nav>

<div class="container py-5">
    <div class="card shadow-sm border-0">
        <div class="card-body text-center">
            <h3 class="mb-4">Welcome to your Dashboard 🎉</h3>
            <div id="userInfo" class="mb-3">
                <p class="text-muted">Loading user info...</p>
            </div>
            <div id="message" class="text-success fw-bold"></div>
        </div>
    </div>
</div>

<script>
async function loadUser() {
    const token = localStorage.getItem('token');
    if (!token) {
        return window.location.href = '/login';
    }

    try {
        const res = await fetch('/api/me', {
            headers: {
                'Authorization': `Bearer ${token}`,
                'Accept': 'application/json'
            }
        });

        if (!res.ok) {
            throw new Error('Unauthorized');
        }

        const user = await res.json();
        document.getElementById('userInfo').innerHTML = `
            <p><strong>Name:</strong> ${user.name}</p>
            <p><strong>Email:</strong> ${user.email}</p>
        `;
    } catch (error) {
        console.error('Error:', error);
        localStorage.removeItem('token');
        window.location.href = '/login';
    }
}

document.getElementById('logoutBtn').addEventListener('click', async () => {
    const token = localStorage.getItem('token');
    if (!token) return window.location.href = '/login';

    try {
        await fetch('/api/logout', {
            method: 'POST',
            headers: {
                'Authorization': `Bearer ${token}`,
                'Accept': 'application/json'
            }
        });
    } catch (e) {
        console.warn('Logout request failed:', e);
    } finally {
        localStorage.removeItem('token');
        window.location.href = '/login';
    }
});

loadUser();
</script>

</body>
</html>
