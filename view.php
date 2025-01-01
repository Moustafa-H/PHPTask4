<?php
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname ='PHPTask4';
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

        if(!$conn) {
            die('Could not connect: ' . mysqli_connect_error($conn));
        }

        $name = "";
        $email = "";
        $gender = "";
        $mail_status = 0;

        $sql = "SELECT * FROM user WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        if ($row = mysqli_fetch_assoc($result)) {
            $name = $row['name'];
            $email = $row['email'];
            $gender = $row['gender'];
            $mail_status = $row['mail_status'];
        }

        if(!$result) {
            die('Could not get data: ' . mysqli_connect_error($result));
        }

        mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body style="margin: 5rem;">
    <h1 style="margin-bottom: 5rem;">View Record</h1>
    <section style="display: flex; flex-direction: column; gap: 1rem; align-items: flex-start;">
        <p style="font-weight: 600;">Name</p>
        <p><?php echo $name; ?></p>
        <p style="font-weight: 600;">Email</p>
        <p><?php echo $email; ?></p>
        <p style="font-weight: 600;">Gender</p>
        <p><?php echo $gender[0]; ?></p>
        <p><?php echo $mail_status ? "You will receive e-mails from us." : "You will not receive e-mails from us."; ?></p>
        <button class="btn btn-primary" onclick="window.location.href='index.php';">Back</button>
    </section>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>