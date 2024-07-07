<?php
    session_start();
?>
<link rel="stylesheet" type="text/css" href="vind.css" >
<body>
    <header>
      <nav>
        <a href="home.html">Home</a>
        <a href="login.html">Login</a>
        <a href="signup.html">Signup</a>
      </nav>
      <div>
            <label for="email">Email: <span id="emailDisplay"></span></label>
      </div>
      <form method="post">
            <div class="header-buttons">
                <button class="log-out-button" type="submit" name="logout">Log Out</button>
            </div>
        </form>
    </header>
   <?php  
            $servername = "localhost";
            $username = "root"; 
            $password = ""; 
            $dbname = "orgvms";
            $conn = new mysqli($servername, $username, $password, $dbname);
            $fetchemail = $_SESSION['email'];

            if ($conn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
            }

                $sql = "SELECT email,account_type,prefix,firstName,lastName,phoneNumber,address,city,state,postalCode,dateofbirth,occupation,interest FROM indsignup WHERE email = '$fetchemail'";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                     while ($row = mysqli_fetch_assoc($result)) {
                        $email = $row['email'];
                        $account_type = $row['account_type'];
                        $prefix = $row['prefix'];
                        $firstName = $row['firstName'];
                        $lastName = $row['lastName'];
                        $phoneNumber = $row['phoneNumber'];
                        $address = $row['address'];
                        $city = $row['city'];
                        $state = $row['state'];
                        $postalCode = $row['postalCode'];
                        $dateofbirth = $row['dateofbirth'];
                        $occupation = $row['occupation'];
                        $interest = $row['interest'];
                    }
                    mysqli_free_result($result);
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            mysqli_close($conn);
            
            if (isset($_POST['logout'])) {
                $_SESSION = array();
                session_destroy();
                header("Location: login.html");
                exit();
            }
?>
    <div class="bg-image">
    <div class="container">
      <div class="login-form">     
        <h2>View Profile</h2>
        <form action="ViewIndProfile.php" method="post">
          <label for="account_type">Account Type: <span id="account_typeDisplay"></span></label>
          <label for="prefix">Prefix: <span id="prefixDisplay"></span></label>
          <label for="firstName">First Name: <span id="firstNameDisplay"></span></label>
          <label for="lastName">Last Name: <span id="lastNameDisplay"></span></label>
          <label for="phoneNumber">Phone Number: <span id="phoneNumberDisplay"></span></label>
          <label for="address">Address: <span id="addressDisplay"></span></label>
          <label for="city">City: <span id="cityDisplay"></span></label>
          <label for="state">State: <span id="stateDisplay"></span></label>
          <label for="postalCode">Postal Code: <span id="postalCodeDisplay"></span></label>
          <label for="dateofbirth">Date of Birth: <span id="dateofbirthDisplay"></span></label>
          <label for="occupation">Occupation: <span id="occupationDisplay"></span></label>
          <label for="interest">Interest: <span id="interestDisplay"></span></label>
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
  <script>
            var emailDisplay = document.getElementById("emailDisplay");
            var emailVariable = "<?php echo $email; ?>";
            emailDisplay.innerHTML = emailVariable;

            var account_typeDisplay = document.getElementById("account_typeDisplay");
            var account_typeVariable = "<?php echo $account_type; ?>";
            account_typeDisplay.innerHTML = account_typeVariable;
            
            var prefixDisplay = document.getElementById("prefixDisplay");
            var prefixVariable = "<?php echo $prefix; ?>";
            prefixDisplay.innerHTML = prefixVariable;

            var firstNameDisplay = document.getElementById("firstNameDisplay");
            var firstNameVariable = "<?php echo $firstName; ?>";
            firstNameDisplay.innerHTML = firstNameVariable;

            var lastNameDisplay = document.getElementById("lastNameDisplay");
            var lastNameVariable = "<?php echo $lastName; ?>";
            lastNameDisplay.innerHTML = lastNameVariable;

            var phoneNumberDisplay = document.getElementById("phoneNumberDisplay");
            var phoneNumberVariable = "<?php echo $phoneNumber; ?>";
            phoneNumberDisplay.innerHTML = phoneNumberVariable;

            var addressDisplay = document.getElementById("addressDisplay");
            var addressVariable = "<?php echo $address; ?>";
            addressDisplay.innerHTML = addressVariable;

            var cityDisplay = document.getElementById("cityDisplay");
            var cityVariable = "<?php echo $city; ?>";
            cityDisplay.innerHTML = cityVariable;

            var stateDisplay = document.getElementById("stateDisplay");
            var stateVariable = "<?php echo $state; ?>";
            stateDisplay.innerHTML = stateVariable;

            var postalCodeDisplay = document.getElementById("postalCodeDisplay");
            var postalCodeVariable = "<?php echo $postalCode; ?>";
            postalCodeDisplay.innerHTML = postalCodeVariable;

            var dateofbirthDisplay = document.getElementById("dateofbirthDisplay");
            var dateofbirthVariable = "<?php echo $dateofbirth; ?>";
            dateofbirthDisplay.innerHTML = dateofbirthVariable;

            var occupationDisplay = document.getElementById("occupationDisplay");
            var occupationVariable = "<?php echo $occupation; ?>";
            occupationDisplay.innerHTML = occupationVariable;

            var interestDisplay = document.getElementById("interestDisplay");
            var interestVariable = "<?php echo $interest; ?>";
            interestDisplay.innerHTML = interestVariable;
</script>
