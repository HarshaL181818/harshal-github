
<?php
session_start();
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "orgvms";
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT eventname, noofvolunteers , eventlocation, eventdate FROM createpost123 WHERE eventname IS NOT NULL AND eventname <> '' ORDER BY inc_id DESC LIMIT 5";
$result = $conn->query($query);
if (!$result) {
    die("Query failed: " . $conn->error);
}

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

$eventname = isset($data[0]['eventname']) ? $data[0]['eventname'] : "";
$eventdate = isset($data[0]['eventdate']) ? $data[0]['eventdate'] : "";
$noofvolunteers = isset($data[0]['noofvolunteers']) ? $data[0]['noofvolunteers'] : "";
$eventlocation = isset($data[0]['eventlocation']) ? $data[0]['eventlocation'] : "";
$_SESSION['eventname'] = $eventname;

$eventname1 = isset($data[1]['eventname']) ? $data[1]['eventname'] : "";
$eventdate1 = isset($data[1]['eventdate']) ? $data[1]['eventdate'] : "";
$noofvolunteers1 = isset($data[1]['noofvolunteers']) ? $data[1]['noofvolunteers'] : "";
$eventlocation1 = isset($data[1]['eventlocation']) ? $data[1]['eventlocation'] : "";
$_SESSION['eventname1'] = $eventname1;

$eventname2 = isset($data[2]['eventname']) ? $data[2]['eventname'] : "";
$eventdate2 = isset($data[2]['eventdate']) ? $data[2]['eventdate'] : "";
$noofvolunteers2 = isset($data[2]['noofvolunteers']) ? $data[2]['noofvolunteers'] : "";
$eventlocation2 = isset($data[2]['eventlocation']) ? $data[2]['eventlocation'] : "";
$_SESSION['eventname2'] = $eventname2;

$eventname3 = isset($data[3]['eventname']) ? $data[3]['eventname'] : "";
$eventdate3 = isset($data[3]['eventdate']) ? $data[3]['eventdate'] : "";
$noofvolunteers3 = isset($data[3]['noofvolunteers']) ? $data[3]['noofvolunteers'] : "";
$eventlocation3 = isset($data[3]['eventlocation']) ? $data[3]['eventlocation'] : "";
$_SESSION['eventname3'] = $eventname3;

$eventname4 = isset($data[4]['eventname']) ? $data[4]['eventname'] : "";
$eventdate4 = isset($data[4]['eventdate']) ? $data[4]['eventdate'] : "";
$noofvolunteers4 = isset($data[4]['noofvolunteers']) ? $data[4]['noofvolunteers'] : "";
$eventlocation4 = isset($data[4]['eventlocation']) ? $data[4]['eventlocation'] : "";
$_SESSION['eventname4'] = $eventname4;
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="IndividualLogin.css" >
</head>

<body>
  <header>
    <nav>
      <a href="home.html">Home</a>
      <a href="login.html">Login</a>
      <a href="signup.html">Signup</a>
      <label for="email">.....Email:</label>
      <span id="emailDisplay"></span>
  </nav>
    <form method="post">
            <div class="header-buttons">
                <button class="view-profile-button" type="button" onclick="viewProfile()">View Profile</button>
                <button class="log-out-button" type="submit" name="logout">Log Out</button>
            </div>
    </form>
  </header>
  

<section style="background: url('./bg.jpg') fixed; background-size: cover; background-attachment: fixed;">
  <div class="leftBox">
    <div class="content">
      <h1>
        Events and programs
      </h1>
      <p>
        Service to others is the rent you pay for your room here on Earth.
      </p>
    </div>
  </div>
  <div class="events">
    <ul>
      <li>
        <div class="time">
          <h2>
          <label for="eventdate"><span id="eventdateDisplay"></span></label>
          </h2>
        </div>
        <div class="details">
          <h2>
            <label for="eventname">Event : <span id="eventnameDisplay"></span></label>
          </h2>
          <p>
            <label for="noofvolunteers">No of volunteers : <span id="noofvolunteersDisplay"></span></label>
          </p>
          <p>
            <label for="eventlocation">Location : <span id="eventlocationDisplay"></span></label>
          </p>
          <a href="viewdetails.php" >View Details</a>
        </div>
        <div style="clear: both;"></div>
      </li>
      <li>
        <div class="time">
          <h2>
          <label for="eventdate1"><span id="eventdate1Display"></span></label>
          </h2>
        </div>
        <div class="details">
          <h2>
          <label for="eventname1">Event : <span id="eventname1Display"></span></label>
          </h2>
          <p>
            <label for="noofvolunteers1">No of volunteers : <span id="noofvolunteers1Display"></span></label>
          </p>
          <p>
            <label for="eventlocation1">Location : <span id="eventlocation1Display"></span></label>
          </p>
          <a href="viewdetails1.php">View Details</a>
        </div>
        <div style="clear:both;"></div>
      </li>
      <li>
        <div class="time">
          <h2>
          <label for="eventdate2"><span id="eventdate2Display"></span></label>
          </h2>
        </div>
        <div class="details">
          <h2>
          <label for="eventname2">Event : <span id="eventname2Display"></span></label>
          </h2>
          <p>
            <label for="noofvolunteers2">No of volunteers : <span id="noofvolunteers2Display"></span></label>
          </p>
          <p>
            <label for="eventlocation2">Location : <span id="eventlocation2Display"></span></label>
          </p>
          <a href="viewdetails2.php">View Details</a>
        </div>
        <div style="clear:both;"></div>
      </li>
      <li>
        <div class="time">
          <h2>
          <label for="eventdate3"><span id="eventdate3Display"></span></label>
          </h2>
        </div>
        <div class="details">
          <h2>
            <label for="eventname3">Event : <span id="eventname3Display"></span></label>
          </h2>
          <p>
            <label for="noofvolunteers3">No of Volunteers : <span id="noofvolunteers3Display"></span></label>
          </p>
          <p>
            <label for="eventlocation3">Location : <span id="eventlocation3Display"></span></label>
          </p>
          <a href="viewdetails3.php" >View Details</a>
        </div>
        <div style="clear: both;"></div>
      </li>
      <li>
        <div class="time">
          <h2>
          <label for="eventdate4"><span id="eventdate4Display"></span></label>
          </h2>
        </div>
        <div class="details">
          <h2>
            <label for="eventname4">Event : <span id="eventname4Display"></span></label>
          </h2>
          <p>
            <label for="noofvolunteers4">No of volunteers : <span id="noofvolunteers4Display"></span></label>
          </p>
          <p>
            <label for="eventlocation4">Location : <span id="eventlocation4Display"></span></label>
          </p>
          <a href="viewdetails4.php" >View Details</a>
        </div>
        <div style="clear: both;"></div>
      </li>
      <li>
      <div class="details">
            <a href="viewdetails4.php" >View More</a>
      </div>
      </li>
</div>
    </ul>
  </div>
</section>
  <footer>
      <a href="#">Terms of Service</a>
      <a href="#">Privacy Policy</a>
      <a href="#">Contact Us</a>
      <span>&copy; 2023 Volunteer Management System</span>
    </footer>
</body>
</html>
<script>
            var emailDisplay = document.getElementById("emailDisplay");
            var emailVariable = "<?php echo $_SESSION['email'];; ?>";
            emailDisplay.innerHTML = emailVariable;

            var eventnameDisplay = document.getElementById("eventnameDisplay");
            var eventnameVariable = "<?php echo $eventname;; ?>";
            eventnameDisplay.innerHTML = eventnameVariable;

            var eventdateDisplay = document.getElementById("eventdateDisplay");
            var eventdateVariable = "<?php echo $eventdate;; ?>";
            eventdateDisplay.innerHTML = eventdateVariable;

            var noofvolunteersDisplay = document.getElementById("noofvolunteersDisplay");
            var noofvolunteersVariable = "<?php echo $noofvolunteers;; ?>";
            noofvolunteersDisplay.innerHTML = noofvolunteersVariable;

            var eventlocationDisplay = document.getElementById("eventlocationDisplay");
            var eventlocationVariable = "<?php echo $eventlocation;; ?>";
            eventlocationDisplay.innerHTML = eventlocationVariable;

            var eventname1Display = document.getElementById("eventname1Display");
            var eventname1Variable = "<?php echo $eventname1;; ?>";
            eventname1Display.innerHTML = eventname1Variable;

            var eventdate1Display = document.getElementById("eventdate1Display");
            var eventdate1Variable = "<?php echo $eventdate1;; ?>";
            eventdate1Display.innerHTML = eventdate1Variable;

            var noofvolunteers1Display = document.getElementById("noofvolunteers1Display");
            var noofvolunteers1Variable = "<?php echo $noofvolunteers1;; ?>";
            noofvolunteers1Display.innerHTML = noofvolunteers1Variable;

            var eventlocation1Display = document.getElementById("eventlocation1Display");
            var eventlocation1Variable = "<?php echo $eventlocation1;; ?>";
            eventlocation1Display.innerHTML = eventlocation1Variable;

            var eventname2Display = document.getElementById("eventname2Display");
            var eventname2Variable = "<?php echo $eventname2;; ?>";
            eventname2Display.innerHTML = eventname2Variable;

            var eventdate2Display = document.getElementById("eventdate2Display");
            var eventdate2Variable = "<?php echo $eventdate2;; ?>";
            eventdate2Display.innerHTML = eventdate2Variable;

            var noofvolunteers2Display = document.getElementById("noofvolunteers2Display");
            var noofvolunteers2Variable = "<?php echo $noofvolunteers2;; ?>";
            noofvolunteers2Display.innerHTML = noofvolunteers2Variable;

            var eventlocation2Display = document.getElementById("eventlocation2Display");
            var eventlocation2Variable = "<?php echo $eventlocation2;; ?>";
            eventlocation2Display.innerHTML = eventlocation2Variable;


            var eventname3Display = document.getElementById("eventname3Display");
            var eventname3Variable = "<?php echo $eventname3;; ?>";
            eventname3Display.innerHTML = eventname3Variable;

            var eventdate3Display = document.getElementById("eventdate3Display");
            var eventdate3Variable = "<?php echo $eventdate3;; ?>";
            eventdate3Display.innerHTML = eventdate3Variable;

            var noofvolunteers3Display = document.getElementById("noofvolunteers3Display");
            var noofvolunteers3Variable = "<?php echo $noofvolunteers3;; ?>";
            noofvolunteers3Display.innerHTML = noofvolunteers3Variable;

            var eventlocation3Display = document.getElementById("eventlocation3Display");
            var eventlocation3Variable = "<?php echo $eventlocation3;; ?>";
            eventlocation3Display.innerHTML = eventlocation3Variable;

            var eventname4Display = document.getElementById("eventname4Display");
            var eventname4Variable = "<?php echo $eventname4;; ?>";
            eventname4Display.innerHTML = eventname4Variable;

            var eventdate4Display = document.getElementById("eventdate4Display");
            var eventdate4Variable = "<?php echo $eventdate4;; ?>";
            eventdate4Display.innerHTML = eventdate4Variable;

            var noofvolunteers4Display = document.getElementById("noofvolunteers4Display");
            var noofvolunteers4Variable = "<?php echo $noofvolunteers4;; ?>";
            noofvolunteers4Display.innerHTML = noofvolunteers4Variable;

            var eventlocation4Display = document.getElementById("eventlocation4Display");
            var eventlocation4Variable = "<?php echo $eventlocation4;; ?>";
            eventlocation4Display.innerHTML = eventlocation4Variable;
        function viewProfile() {
            window
            .location.href = "ViewIndProfile.php"; 
        }
        
        function viewMore() {
            window.location.href = "#";
        }
</script>
<?php
  if (isset($_POST['logout'])) {
    $_SESSION = array();
    session_destroy();
    header("Location: login.html");
    exit();
}
?>

