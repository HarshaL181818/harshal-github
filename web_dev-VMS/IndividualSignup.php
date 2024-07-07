<?php
$servername = "localhost";
$dbusername = "root"; 
$dbpassword = ""; 
$dbname = "orgvms";

$account_type= "volunteer";
$prefix= filter_input(INPUT_POST, 'prefix');
$firstName= filter_input(INPUT_POST, 'firstName');
$lastName= filter_input(INPUT_POST, 'lastName');
$phoneNumber= filter_input(INPUT_POST, 'phoneNumber');
$email= filter_input(INPUT_POST, 'email');
$password= filter_input(INPUT_POST, 'password');
$cpassword= filter_input(INPUT_POST, 'cpassword');
$address= filter_input(INPUT_POST, 'address');
$city= filter_input(INPUT_POST, 'city');
$state= filter_input(INPUT_POST, 'state');
$postalCode= filter_input(INPUT_POST, 'postalCode');
$dateofbirth= filter_input(INPUT_POST, 'dateofbirth');
$occupation= filter_input(INPUT_POST, 'occupation');
$interest= filter_input(INPUT_POST, 'interest');

$conn = new mysqli($servername, $dbusername, $dbpassword,$dbname);

try {
    if ($password !== $cpassword) {
        throw new Exception('Passwords do not match.');
    } elseif (strpos($email, ".com") == false) {
      if (!empty($email))
      throw new Exception('Invalid email');
    }
     else {
            $sql = "INSERT INTO indsignup (account_type,prefix,firstName,lastName,phoneNumber,email,password,address,city,state,postalCode,dateofbirth,occupation,interest) 
                values ('$account_type','$prefix','$firstName','$lastName','$phoneNumber','$email','$password','$address','$city','$state','$postalCode','$dateofbirth','$occupation','$interest')";
            if($conn->query($sql))
            {
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
<link rel="stylesheet" type="text/css" href="IndividualSignup.css" >
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
        <form action="IndividualSignup.php" method="post">

          <label for="Prefix"> Prefix: </label>
          <select name="prefix" id="Prefix">
            <option value="Mr.">Mr.</option>
            <option value="Mrs.">Mrs.</option></select>

          <label for="first Name">First Name: </label>
          <input name="firstName" id="first Name" type="text" required> 

          <label for="last Name">Last Name: </label>
          <input name="lastName" id="last Name" type="text" required>

          <label for="phone number">Phone Number: </label>
          <input name="phoneNumber" id="phone Number" type="number"  required>

          <label for="email">Email:</label>
          <input type="text" id="Email" name="email" placeholder="ex:jack@12" required>

          <label for="password">Password:</label>
          <input type="password" id="password" name="password" placeholder="Enter Password" required>
            
          <label for="cpassword">Confirm Password:</label>
          <input type="password" id="cpassword" name="cpassword" required>

          <label for="address">Address: </label>
          <input name="address" id="address" type="text" required>

          <label for="city">City: </label>
          <input name="city" id="city" type="text" required>

          <label for="state">State: </label>
          <input name="state" id="state" type="text" required>
          
          <label for="postal code">Postal Code: </label>
          <input name="postalCode" id="postal code" type="text" required>
        

          <label for="dateofbirth">Date Of Birth</label>
          <input name="dateofbirth" id="dateofbirth" type="date" required>

          <label for="occupation">Occupation: </label>
          <select name="occupation" id="occupation" required>
            <option value="">-select one-</option>
            <option value="Student">Student</option>
            <option value="Graduate">Graduate</option>
            <option value="Homemaker">Homemaker</option>
            <option value="Employed ">Employed </option>
            <option value="Retired">Retired</option>
          </select>  
          
          <label for="interest">Interest :</label>
            <select id="interest" name="interest" required>
              <option value="healthcare">Healthcare</option>
              <option value="education">Education</option>
              <option value="animal-welfare">Animal Welfare</option>
              <option value="environment-conservation">Evironment and Conservation</option>
              <option value="social-service">Social Services</option>
              <option value="elderly-care">Elderly Care</option>
              <option value="disability">Disability Services</option>
            </select>

          <input type="submit" value="Signup">
        </form>
      </div>
    </div>
  </div>
    <footer>
      <a href="#">Terms of Service</a>
      <a href="#">Privacy Policy</a>
      <a href="#">Contact Us</a>
      <span>&copy; <script>document.write(new Date().getFullYear())</script> Volunteer Management System</span>
    </footer>
  </body>
  

