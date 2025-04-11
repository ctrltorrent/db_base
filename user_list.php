user_list.php
<?php
$servername = "localhost";
$username = "root"; // Default username for WAMP
$password = ""; // Default password is empty
$database = "user.db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Fetch users
$sql = "SELECT name, email FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . htmlspecialchars($row['name']) . " (" . htmlspecialchars($row['email']) . ")</li>";
    }
    echo "</ul>";
} else {
    echo "No users found.";
}
?>

