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
    <title>Insert</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body style="margin: 5rem;">
    <h1 style="margin-bottom: 5rem;">User Registration Form</h1>
    <p>Please fill this form and submit to add user record to the database.</p>
    <form method="POST" enctype="multipart/form-data" action="">
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" id="name" name="name" value="<?php echo $name; ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
        </div>
        <label>Gender</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="female" value="Female" <?php echo $gender == "Male" ? "" : "checked"; ?>>
            <label class="form-check-label" for="female">
                Female
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="male" value="Male" <?php echo $gender == "Male" ? "checked" : ""; ?>>
            <label class="form-check-label" for="male">
                Male
            </label>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="check" name="mail_status" <?php echo $mail_status ? "checked" : ""; ?>>
            <label class="form-check-label" for="check">Recieve E-Mails from us.</label>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <button type="reset" onclick="window.location.href='index.php';" class="btn btn-light">Cancel</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

<?php
    if (isset($_POST["submit"]) && isset($_POST["name"]) && isset($_POST["email"])) {
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname ='PHPTask4';
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
        
        if(!$conn) {
            die('Could not connect: ' . mysqli_connect_error($conn));
        }

        $name = $_POST["name"];
        $email = $_POST["email"];
        $gender = $_POST["gender"];
        $mail_status = isset($_POST["mail_status"]) ? 1 : 0;
        
        if (isset($_GET["id"])) {
            $sql = "UPDATETABLE user
                    SET name='$name', email='$email', gender='$gender', mail_status='$mail_status'
                    WHERE id=$id";
        } else {
            $sql = "INSERT INTO user(name, email, gender, mail_status)
                    VALUES ('$name', '$email', '$gender', '$mail_status')";
        }
        $result = mysqli_query($conn, $sql);
        
        if(!$result) {
            die('Could not get data: ' . mysqli_connect_error($result));
        }
        
        mysqli_close($conn);

        header("Location: index.php");
        exit;
    }
?>