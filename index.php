<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname ='PHPTask4';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    
    if(!$conn) {
        die('Could not connect: ' . mysqli_connect_error($conn));
    }
    
    $sql = 'SELECT * FROM user';
    $result = mysqli_query($conn, $sql);
    
    if(!$result) {
        die('Could not get data: ' . mysqli_connect_error($result));
    }
    
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body style="margin: 5rem;">
    <div style="display: flex; justify-content: space-between; margin-bottom: 2rem;">
        <h1>Users Details</h1>
        <button onclick="window.location.href='insert.php';" class="btn btn-success">Add New User</button>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Gender</th>
                <th scope="col">Mail Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>
                            <th scope="row">' . $row['id'] . '</th>
                            <td>' . $row['name'] .'</td>
                            <td>' . $row['email'] .'</td>
                            <td>' . $row['gender'] .'</td>
                            <td>' . ($row['mail_status'] == 1 ? 'Yes' : 'No') .'</td>
                            <td>
                                <a href="view.php?id='.$row['id'].'"><img src="./icons/eye-fill.svg" alt="view" width="16" height="16"></a>
                                <a href="insert.php?id='.$row['id'].'"><img src="./icons/pencil-fill.svg" alt="update" width="16" height="16"></a>
                                <a href="delete.php?id='.$row['id'].'"><img src="./icons/trash-fill.svg" alt="delete" width="16" height="16"></a>
                            </td>
                        </tr>';
                    }
                }
            ?>
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>