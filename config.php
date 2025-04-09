config.php
<?php
// InfinityFree MySQL Configuration
$db_host = "gibson-tor.free.nf"; // Replace XXX with your server
$db_user = "if0_38703864";      // Your MySQL username
$db_pass = "lHg3gIOKX2uf";    // Your MySQL password
$db_name = "if0_38703864_db_users";   // Your database name

// Create connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>