<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Dashboard</h2>
    <div id="userInfo"></div>
    <button id="logoutBtn" class="btn btn-danger mt-3">Logout</button>
</div>

<script>
async function loadUser(){
    const token = localStorage.getItem('token');
    if(!token) return window.location.href = '/login';

    try {
        const res = await fetch('/api/me', {
            headers: { 'Authorization': `Bearer ${token}` }
        });

        if(res.ok){
            const user = await res.json();
            document.getElementById('userInfo').innerHTML = `
                <p>Name: ${user.name}</p>
                <p>Email: ${user.email}</p>
            `;
        } else {
            localStorage.removeItem('token');
            window.location.href = '/login';
        }
    } catch(err){
        localStorage.removeItem('token');
        window.location.href = '/login';
    }
}

document.getElementById('logoutBtn').addEventListener('click', async () => {
    const token = localStorage.getItem('token');
    if(token){
        await fetch('/api/logout', {
            method: 'POST',
            headers: { 'Authorization': `Bearer ${token}` }
        });
    }
    localStorage.removeItem('token');
    window.location.href = '/login';
});

loadUser();
</script>
</body>
</html>
