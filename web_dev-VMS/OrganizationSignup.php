<?php
$servername = "localhost";
$dbusername = "root"; 
$dbpassword = ""; 
$dbname = "orgvms";

$orgname= filter_input(INPUT_POST, 'orgname');
$liscense= filter_input(INPUT_POST, 'liscense');
$address= filter_input(INPUT_POST, 'address');
$contact= filter_input(INPUT_POST, 'contact');
$orgtype= filter_input(INPUT_POST, 'orgtype');
$email= filter_input(INPUT_POST, 'email');
$opassword= filter_input(INPUT_POST, 'opassword');
$cpassword= filter_input(INPUT_POST, 'cpassword');
$account_type= "organization";
$conn = new mysqli($servername, $dbusername, $dbpassword,$dbname);
try {
    if ($opassword !== $cpassword) {
        throw new Exception('Passwords do not match.');
    } elseif (strpos($email, ".com") == false) {
      if (!empty($email))
        throw new Exception('Invalid email');
    }
     else {
        // Perform the database insert only if 'liscense' is not empty
        $sql = "INSERT INTO signup (orgname, liscense, address, contact, orgtype, email, opassword, account_type) 
        VALUES ('$orgname', '$liscense', '$address', '$contact', '$orgtype', '$email', '$opassword', '$account_type')";
        
        if ($conn->query($sql) === TRUE) {
            header("Location: login.html");
        } else {
            throw new Exception('Error inserting data into the database: ' . $conn->error);
        }
    }
} catch (Exception $e) {
    echo "<script>alert('" . $e->getMessage() . "')</script>";
}

$conn->close();
?>
<link rel="stylesheet" href="OrganizationSignup.css">

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <header>
    <nav>
      <a href="home.html">Home</a>
      <a href="login.html">Login</a>
      <a href="signup.html">Signup</a>
    </nav>
  </header>
  <div class="bg-image">
    <div class="container">
      <div class="login-form">
        <h2>Create an Account</h2>
        <form action="OrganizationSignup.php" method="post">

          <label for="orgname">Name of the organisation:</label>
          <input type="text" id="orgname" name="orgname" required>
        
          <label for="liscence">Liscence no:</label>
          <input type="text" id="liscense" name="liscense" required>
        
          <label for="address">Address:</label>
          <input type="text" id="address" name="address" required>
        
          <label for="contact">Contact no:</label>
          <input type="text" id="contact" name="contact" required>

          <label for="orgtype">Type of Organisation:</label>
          <select id="orgtype" name="orgtype" required>
            <option value="healthcare">Healthcare</option>
            <option value="education">Education</option>
            <option value="animal-welfare">Animal Welfare</option>
            <option value="environment-conservation">Evironment and Conservation</option>
            <option value="social-service">Social Services</option>
            <option value="elderly-care">Elderly Care</option>
            <option value="disability">Disability Services</option>
          </select>
        
          <label for="email">Email:</label>
          <input type="text" id="email" name="email" required>

          <label for="opassword">Password:</label>
          <input type="opassword" id="opassword" name="opassword" required>
        
          <label for="cpassword">Confirm Password:</label>
          <input type="password" id="cpassword" name="cpassword" required>

        
          <input type="submit" value="Signup">
        </form>
      </div>
    </div>
  </div>
  <footer>
    <a href="#">Terms of Service</a>
    <a href="#">Privacy Policy</a>
    <a href="#">Contact Us</a>
    <span>&copy; 2023 Your Simple Ecommerce Website</span>
  </footer>
</body>

</html>