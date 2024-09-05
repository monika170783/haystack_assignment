<link rel="stylesheet" href="assets/css/main.css" type="text/css">
<div class="container">
  <div class="card">
    <h2>Login</h2>
    <form id="login-form">
      <input type="text" id="username" name="username" placeholder="Username" required>
      <input type="password" id="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>
  </div>
</div>

<script>
    document.getElementById('login-form').addEventListener('submit', function(e) {
        e.preventDefault();

        // Send data to PHP backend using AJAX
        var formData = {
            username: document.getElementById('username').value,
            password: document.getElementById('password').value,
        };

        fetch('/assignment/backend/login.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(formData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = '/assignment/frontend/dashboard.php';
            } else {
                alert('Login failed: ' + data.message);
            }
        });
    });
</script>
