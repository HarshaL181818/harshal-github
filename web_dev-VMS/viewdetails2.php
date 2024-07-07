<?php
  session_start();
?>
<link rel="stylesheet" href="vdetails.css">

<body>
    <header>
      <nav>
        <a href="home.html">Home</a>
        <a href="login.html">Login</a>
        <a href="signup.html">Signup</a>
      </nav>
        <div>
            <label for="email">.  Email:</label>
            <span id="emailDisplay"></span>
        </div>
        <form method="post">
            <div class="header-buttons">
                <button class="log-out-button" type="submit" name="logout">Log Out</button>
            </div>
        </form>
    </header>
    <?php   
            $applied= filter_input(INPUT_POST, 'applied');
            $servername = "localhost";
            $username = "root"; 
            $password = "";
            $dbname = "orgvms";

            $conn = new mysqli($servername, $username, $password, $dbname);
            $eventname = $_SESSION['eventname2'];
            $email = $_SESSION['email'];

            if ($conn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT email, eventname, eventdate, eventtime, eventduration, eventlocation, noofvolunteers, managername, contactdetails, eventdescription, eventpurpose FROM createpost123 WHERE eventname = '$eventname' AND eventname IS NOT NULL";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                     while ($row = mysqli_fetch_assoc($result)) {
                        $emailoforg = $row["email"];
                        $eventname = $row['eventname'];
                        $eventdate = $row['eventdate'];
                        $eventtime = $row['eventtime'];
                        $eventduration = $row['eventduration'];
                        $eventlocation = $row['eventlocation'];
                        $noofvolunteers = $row['noofvolunteers'];
                        $managername = $row['managername'];
                        $contactdetails = $row['contactdetails'];
                        $eventdescription = $row['eventdescription'];
                        $eventpurpose = $row['eventpurpose'];
                    }
                    mysqli_free_result($result);
                } else {
                    echo "Error: " . mysqli_error($conn);
                }

            $sql = "SELECT account_type,prefix,firstName,lastName,phoneNumber,address,city,state,postalCode,dateofbirth,occupation,interest FROM indsignup WHERE email = '$email'";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                     while ($row = mysqli_fetch_assoc($result)) {
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

                $message = filter_input(INPUT_POST, 'message');
if($applied == "apply")
        {   $applied = "123";
            $sql = "INSERT INTO applied123 (emailoforg,eventName,prefix,firstName,lastName,phoneNumber,email,address,city,state,postalCode,dateofbirth,occupation,interest,message) 
                values ('$emailoforg','$eventname','$prefix','$firstName','$lastName','$phoneNumber','$email','$address','$city','$state','$postalCode','$dateofbirth','$occupation','$interest','$message')";
            if ($conn->query($sql)) {
              echo '<script>alert("Applied successfully!");</script>';
          } else {
              echo '<script>alert("Error: ' . mysqli_error($conn) . '");</script>';
          }
        }
$conn->close();

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
          <h2>Your Account details are</h2>
          <form action="viewdetails2.php" method="post">
          
            <label for="eventname">Event Name: <span id="eventnameDisplay"></span></label>
            <label for="emailoforg">Email of organization: <span id="emailoforgDisplay"></span></label>
            <label for="eventdate">Event Date: <span id="eventdateDisplay"></span></label>
            <label for="eventtime">Time: <span id="eventtimeDisplay"></span></label>
            <label for="eventduration">Duration: <span id="eventdurationDisplay"></span></label>
            <label for="eventlocation">Location: <span id="eventlocationDisplay"></span></label>
            <label for="noofvolunteers">Number of volunteers: <span id="noofvolunteersDisplay"></span></label>
            <label for="managername">Manager Name: <span id="managernameDisplay"></span></label>
            <label for="contactdetails">Contact: <span id="contactdetailsDisplay"></span></label>
            <label for="eventdescription">Description: <span id="eventdescriptionDisplay"></span></label>
            <label for="eventpurpose">Purpose: <span id="eventpurposeDisplay"></span></label>

            <label for="applyCheckbox">Apply for this event now (tick here)</label>
            <input type="checkbox" name="applied" id="applied" value="apply">
            <label for="message">Enter the message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <input type="submit" value="Apply">
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

  <script>
        var emaileDisplay = document.getElementById("emailDisplay");
        var emailVariable = "<?php echo $_SESSION['email'];; ?>";
        emailDisplay.innerHTML = emailVariable;

        var eventnameDisplay = document.getElementById("eventnameDisplay");
        var eventnameVariable = "<?php echo $eventname; ?>";
        eventnameDisplay.innerHTML = eventnameVariable;

        var emailoforgDisplay = document.getElementById("emailoforgDisplay");
        var emailoforgVariable = "<?php echo $emailoforg; ?>";
        emailoforgDisplay.innerHTML = emailoforgVariable;
        
        var eventdateDisplay = document.getElementById("eventdateDisplay");
        var eventdateVariable = "<?php echo $eventdate; ?>";
        eventdateDisplay.innerHTML = eventdateVariable;
        
        var eventtimeDisplay = document.getElementById("eventtimeDisplay");
        var eventtimeVariable = "<?php echo $eventtime; ?>";
        eventtimeDisplay.innerHTML = eventtimeVariable;

        var eventdurationDisplay = document.getElementById("eventdurationDisplay");
        var eventdurationVariable = "<?php echo $eventduration; ?>";
        eventdurationDisplay.innerHTML = eventdurationVariable;

        var eventlocationDisplay = document.getElementById("eventlocationDisplay");
        var eventlocationVariable = "<?php echo $eventlocation; ?>";
        eventlocationDisplay.innerHTML = eventlocationVariable;

        var noofvolunteersDisplay = document.getElementById("noofvolunteersDisplay");
        var noofvolunteersVariable = "<?php echo $noofvolunteers; ?>";
        noofvolunteersDisplay.innerHTML = noofvolunteersVariable;

        var managernameDisplay = document.getElementById("managernameDisplay");
        var managernameVariable = "<?php echo $managername; ?>";
        managernameDisplay.innerHTML = managernameVariable;

        var eventlocationDisplay = document.getElementById("eventlocationDisplay");
        var eventlocationVariable = "<?php echo $eventlocation; ?>";
        eventlocationDisplay.innerHTML = eventlocationVariable;

        var noofvolunteersDisplay = document.getElementById("noofvolunteersDisplay");
        var noofvolunteersVariable = "<?php echo $noofvolunteers; ?>";
        noofvolunteersDisplay.innerHTML = noofvolunteersVariable;

        var managernameDisplay = document.getElementById("managernameDisplay");
        var managernameVariable = "<?php echo $managername; ?>";
        managernameDisplay.innerHTML = managernameVariable;

        var contactdetailsDisplay = document.getElementById("contactdetailsDisplay");
        var contactdetailsVariable = "<?php echo $contactdetails; ?>";
        contactdetailsDisplay.innerHTML = contactdetailsVariable;

        var eventdescriptionDisplay = document.getElementById("eventdescriptionDisplay");
        var eventdescriptionVariable = "<?php echo $eventdescription; ?>";
        eventdescriptionDisplay.innerHTML = eventdescriptionVariable;

        var eventpurposeDisplay = document.getElementById("eventpurposeDisplay");
        var eventpurposeVariable = "<?php echo $eventpurpose; ?>";
        eventpurposeDisplay.innerHTML = eventpurposeVariable;

        function viewProfile() {
            window.location.href = "ViewIndProfile.php"; 
        }
    </script>