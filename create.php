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
        <label>Name</label>
        <input type="text" name="name" required>
        <label>Email</label>
        <input type="email" name="email" required>
        <label>Phone</label>
        <input type="tel" name="phone" required>
        <button type="submit" name="submit">Submit</button>
    </form>
    <a href="index.php">Back to List</a>

    <?php
    if (isset($_POST['submit'])) {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO users (name, email, phone) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $phone);

        // Set parameters and execute
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

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
