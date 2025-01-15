<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Basic Bootstrap Layout</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
    .sidebar {
      min-width: 200px;
      background-color: #343a40;
      color: white;
      height: 100vh;
      position: fixed;
    }
    .sidebar a {
      color: white;
      padding: 10px;
      text-decoration: none;
      display: block;
    }
    .sidebar a:hover {
      background-color: #495057;
    }
    .content {
      margin-left: 210px;
      padding: 20px;
    }
    .footer {
      background-color: #343a40;
      color: white;
      text-align: center;
      padding: 10px;
      position: absolute;
      bottom: 0;
      width: 100%;
    }
  </style>
</head>
<body>

  <!-- Header -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">My Website</a>
    </div>
  </nav>

  <!-- Sidebar -->
  <div class="sidebar">
    <h4 class="p-3">Menu</h4>
    <a href="#dashboard">Dashboard</a>
    <a href="#register">Register</a>
    <a href="#form">Form</a>
  </div>

  <!-- Main Content -->
  <div class="content">
    <h3>Register Form</h3>
    <form>
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" placeholder="Enter your username">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" placeholder="Enter your email">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Enter your password">
      </div>
      <button type="submit" class="btn btn-primary">Register</button>
    </form>
  </div>

  <!-- Footer -->
  <div class="footer">
    <p>© 2025 My Website | All Rights Reserved</p>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
