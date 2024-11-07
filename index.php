<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<div class="container">
    <h2>Users List</h2>
    <a href="create.php" class="button-edit">Add New User</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Address</th>
                <th>Course</th>
                <th>Section</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["first_name"] . "</td>";
                    echo "<td>" . $row["middle_name"] . "</td>";
                    echo "<td>" . $row["last_name"] . "</td>";
                    echo "<td>" . $row["age"] . "</td>";
                    echo "<td>" . $row["address"] . "</td>";
                    echo "<td>" . $row["course"] . "</td>";
                    echo "<td>" . $row["section"] . "</td>";
                    echo "<td>
                        <a href='update.php?id=" . $row["id"] . "' class='button-edit'>Edit</a> |
                        <a href='delete.php?id=" . $row["id"] . "' class='button-delete'>Delete</a>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No users found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
