<?php
// PostgreSQL connection for Render deployment
$host = "dpq-over_"; // Your Render database host (from PSQL Command)
$port = "5432"; // Default PostgreSQL port
$dbname = "signup_form"; // From your Databases section
$username = "signup_form_user"; // From your Username section
$password = "0jsdBdinc3kMtxkcanytrefTo04801A2"; // From your Password section

// Create connection string
$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$username;password=$password";

try {
    // Create PDO connection
    $conn = new PDO($dsn);
    
    // Set PDO to throw exceptions on error
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Optional: Set default fetch mode to associative array
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    // echo "Connected successfully"; // Uncomment for testing
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
