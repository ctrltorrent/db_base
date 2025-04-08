<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash password
    $phonenumber = trim($_POST['phone_number']);
    $education = trim($_POST['education']);
    $skills = trim($_POST['skills']);
    $user_references = trim($_POST['user_references']);


    // Check if email already exists
    $check_email = $conn->prepare("SELECT email FROM users WHERE email = ?");
    $check_email->bind_param("s", $email);
    $check_email->execute();
    $check_email->store_result();

    
    if ($check_email->num_rows > 0) {
        echo "<script>alert('Email already registered! Try another.'); window.location.href='signup.html';</script>";
        exit();
    }

    // Prepare SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, phone_number, education, skills, user_references) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $name, $email, $password, $phonenumber, $education, $skills, $user_references);

    if ($stmt->execute()) {
        echo "<script>alert('User registered successfully!'); window.location.href='index.html';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>