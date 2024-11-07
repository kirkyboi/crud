<?php
include 'config.php';

$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id = $id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $course = $_POST['course'];
    $section = $_POST['section'];

    $sql = "UPDATE users SET first_name='$first_name', middle_name='$middle_name', last_name='$last_name', age=$age, address='$address', course='$course', section='$section' WHERE id=$id";

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
        <label>First Name</label>
        <input type="text" name="first_name" value="<?php echo $user['first_name']; ?>" required>
        <label>Middle Name</label>
        <input type="text" name="middle_name" value="<?php echo $user['middle_name']; ?>" required>
        <label>Last Name</label>
        <input type="text" name="last_name" value="<?php echo $user['last_name']; ?>" required>
        <label>Age</label>
        <input type="number" name="age" value="<?php echo $user['age']; ?>" required>
        <label>Address</label>
        <input type="text" name="address" value="<?php echo $user['address']; ?>" required>
        <label>Course</label>
        <input type="text" name="course" value="<?php echo $user['course']; ?>" required>
        <label>Section</label>
        <input type="text" name="section" value="<?php echo $user['section']; ?>" required>
        <button type="submit" name="submit">Update</button>
    </form>
    <a href="index.php">Back to List</a>
</div>
</body>
</html>
