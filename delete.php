<?php
include 'config.php';

$id = $_GET['id'];
$sql = "DELETE FROM users WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "<p>User deleted successfully</p>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>

<a href="index.php">Back to List</a>
