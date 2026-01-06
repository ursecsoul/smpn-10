<?php
session_start();
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $query = "SELECT * FROM admins WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();

    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admins'] = $admin['username'];
        header("Location: ../indexx.php?page=dashboard");
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Arial', sans-serif;
        }
        .login-container {
            width: 100%;
            max-width: 400px;
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            position: relative;
            overflow: hidden;
        }
        .login-container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(0deg, transparent, #2ecc71, #27ae60);
            transform-origin: bottom right;
            animation: border-flow 10s linear infinite;
        }
        .btn-green {
            background: linear-gradient(to right, #2ecc71, #27ae60);
            border: none;
            color: white;
            padding: 12px;
            border-radius: 30px;
            transition: all 0.3s ease;
        }
        .btn-green:hover {
            transform: translateY(-3px);
            box-shadow: 0 7px 14px rgba(0,0,0,.1);
        }
        .form-control {
            border-radius: 30px;
            border: 2px solid #e0e0e0;
            padding: 12px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #2ecc71;
            box-shadow: none;
        }
        @keyframes border-flow {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .form-label {
            margin-left: 10px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="text-center mb-4" style="color: #27ae60;">Login Admin</h2>
        <form method="POST" action="admin/indexx.php?page=dashboard">
        <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="mb-4">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <button type="submit" class="btn btn-green w-100">Login</button>
        </form>
    </div>
</body>
</html>