<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</head>
<body>
<div class="container">
    <h2>Create New User</h2>
    <form action="" method="POST">
        <label>First Name</label>
        <input type="text" name="first_name" required>
        <label>Middle Name</label>
        <input type="text" name="middle_name" required>
        <label>Last Name</label>
        <input type="text" name="last_name" required>
        <label>Age</label>
        <input type="number" name="age" required>
        <label>Address</label>
        <input type="text" name="address" required>
        <label>Course</label>
        <input type="text" name="course" required>
        <label>Section</label>
        <input type="text" name="section" required>
        <button type="submit" name="submit">Submit</button>
    </form>
    <a href="index.php">Back to List</a>

    <?php
    if (isset($_POST['submit'])) {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO users (first_name, middle_name, last_name, age, address, course, section) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssisss", $first_name, $middle_name, $last_name, $age, $address, $course, $section);

        // Set parameters and execute
        $first_name = $_POST['first_name'];
        $middle_name = $_POST['middle_name'];
        $last_name = $_POST['last_name'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $course = $_POST['course'];
        $section = $_POST['section'];

        if ($stmt->execute()) {
            echo "<script>
                    swal('Success!', 'User created successfully', 'success')
                    .then((value) => {
                        window.location.href = 'index.php'; // Redirect to index.php after closing alert
                    });
                  </script>";
        } else {
            echo "<script>
                    swal('Error!', 'Error: " . $stmt->error . "', 'error');
                  </script>";
        }

        // Close the statement
        $stmt->close();
    }
    ?>
</div>
</body>
</html>
