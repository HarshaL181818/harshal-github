<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "orgvms";
$account_type = filter_input(INPUT_POST, 'account_type'); 
$email = filter_input(INPUT_POST, 'email'); 
$opassword = filter_input(INPUT_POST, 'opassword'); 

if ($account_type === 'organisation')
{
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT email, opassword FROM signup WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if ($opassword === $row['opassword']) 
        {
            session_start();
            $_SESSION['email'] = $row['email'];
            $_SESSION['opassword'] = $row['opassword'];
            header("Location: OrganizationFeed.php");
            exit();
        } 
        else 
        {           
            echo "Incorrect password. Please try again.";
        }
    } else {
        echo "User not found. Please check your username.";
    }
}
else
{ 
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT email,password FROM indsignup WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) 
    {
        $row = $result->fetch_assoc();
        if ($opassword === $row['password']) 
        {
            session_start();
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
            header("Location: IndividualFeed.php");
            exit();
        }

        else {
            echo "Incorrect password. Please try again.";
        }
    }else {
        echo "User not found. Please check your username.";
    }

}
mysqli_close($conn);
?>
