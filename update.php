<?php
include 'config.php';

$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id = $id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE users SET name='$name', email='$email', phone='$phone' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<p>User updated successfully</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Update User</h2>
    <form action="" method="POST">
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $user['name']; ?>" required>
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $user['email']; ?>" required>
        <label>Phone</label>
        <input type="tel" name="phone" value="<?php echo $user['phone']; ?>" required>
        <button type="submit" name="submit">Update</button>
    </form>
    <a href="index.php">Back to List</a>
</div>
</body>
</html>
