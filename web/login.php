<?php
// login.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle the login logic here
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Example: Fetch user data from the database
    // $result = $db->query("SELECT * FROM users WHERE email='$email'");
    // $user = $result->fetch_assoc();

    // For demonstration, assume the password is 'password123'
    $hashedPassword = password_hash("password123", PASSWORD_DEFAULT);

    if (password_verify($password, $hashedPassword)) {
        echo "Login successful!";
        // Redirect to dashboard or homepage
        // header("Location: dashboard.php");
    } else {
        echo "Invalid credentials.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Login</h2>
        <form method="POST" action="login.php">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <p class="mt-3">Don't have an account? <a href="register.php">Register here</a></p>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
