<link rel="stylesheet" href="assets/css/main.css" type="text/css">
<div class="container">
    <div class="card">
        <h2>Register</h2>
        <form id="signup-form">
            <input type="text" id="first_name" name="first_name" placeholder="Firstname" required>
            <input type="text" id="last_name" name="last_name" placeholder="Lastname" required>
            <input type="email" id="email" name="email" placeholder="Email id" required>
            <input type="text" id="phone" name="phone" placeholder="Phone" required>

            <input type="text" id="username" name="username" placeholder="Username" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>
    </div>
</div>

<script>
    function validateEmail(email) {
        // Regular expression to validate an email address
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        return emailRegex.test(email);
    }

    function validatePhoneNumber(phoneNumber) {
        // Regular expression to validate a 10-digit phone number
        const phoneRegex = /^\d{10}$/;

        return phoneRegex.test(phoneNumber);
    }
    
    document.getElementById('signup-form').addEventListener('submit', function(e) {
        e.preventDefault();

        var email = document.getElementById('email').value;
        var phone = document.getElementById('phone').value;

        // Validate email
        if (!validateEmail(email)) {
            alert('Invalid email address. Please enter a valid email.');
            return; 
        }

        // Validate phone number
        if (!validatePhoneNumber(phone)) {
            alert('Invalid phone number. Please enter a 10-digit phone number.');
            return;
        }

        var formData = {
            first_name: document.getElementById('first_name').value,
            last_name: document.getElementById('last_name').value,
            email: document.getElementById('email').value,
            phone: document.getElementById('phone').value,
            username: document.getElementById('username').value,
            password: document.getElementById('password').value,
        };

        fetch('/assignment/backend/signup.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(formData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Sign up successful');
                    window.location.href = data.redirect;
                } else {
                    alert('Sign up failed: ' + data.message);
                }
            });
    });
</script>