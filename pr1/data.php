<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="2">
        <thead>
            <tr>
            <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Password</th>
                <th>Created_at</th>
                <th>Status</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once("database.php");

            $sql = "SELECT * FROM users_login";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . ($row['user_id']) . '</td>';
                    echo '<td>' . ($row['name']) . '</td>';
                    echo '<td>' . ($row['email']) . '</td>';
                    echo '<td>' . ($row['phone']) . '</td>';
                    echo '<td>' . ($row['password']) . '</td>';
                    echo '<td>' . ($row['created_at']) . '</td>';
                    echo '<td>' . ($row['status']) . '</td>';
                    // echo '<td>' . "<script> . '<a href="dalete.php">Delete</a>'. </script>" .'</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="6">Data not available</td></tr>';
            }
            ?>
        </tbody>
    </table>
</body>

</html>
