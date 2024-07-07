<?php
$servername = "localhost";
$dbusername = "root"; 
$dbpassword = ""; 
$dbusername = "#"; //database variables

$email= filter_input(INPUT_POST, 'email'); //taking input from html form
$password= filter_input(INPUT_POST, 'password');
$cpassword= filter_input(INPUT_POST, 'cpassword');

$conn = new mysqli($servername, $dbusername, $dbpassword,$dbname); //establishing database connection

try {
    if ($password !== $cpassword) { //check if password==confirm password
        throw new Exception('Passwords do not match.');
    } elseif (strpos($email, ".com") == false) { //check if the email string has .com in it
      if (!empty($email))
      throw new Exception('Invalid email');
    }
     else {
            $sql = "INSERT INTO signup (email,password) /* database contents */
                values ('$email','$password')"; /*variables whose data needs to be inserted in the rows specified above */
            if($conn->query($sql)) /* run the $sql query */
            {
                echo 'connection successful';
            } else {
                throw new Exception('Error inserting data into the database: ' . $conn->error);
            }   
    }
} catch (Exception $e) {
    echo "<script>alert('" . $e->getMessage() . "')</script>";
}
$conn->close();
?>
<body>
    <h2>Create an Account</h2>
        <form action="signup.php" method="post">
          <label for="email">Email:</label>
          <input type="text" id="Email" name="email" placeholder="ex:jack@12" required>

          <label for="password">Password:</label>
          <input type="password" id="password" name="password" placeholder="Enter Password" required>
            
          <label for="cpassword">Confirm Password:</label>
          <input type="password" id="cpassword" name="cpassword" required>

          <input type="submit" value="Signup">
        </form>
</body>
</html>       