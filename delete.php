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

        $sql = "DELETE FROM user WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        if(!$result) {
            die('Could not get data: ' . mysqli_connect_error($result));
        }

        mysqli_close($conn);
        
        header("Location: index.php");
        exit;
    }
?>