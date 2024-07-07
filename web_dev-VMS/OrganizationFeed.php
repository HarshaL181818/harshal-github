  <style>

.banner-image {
background: center/cover no-repeat;
  padding: 20px;
  background-color: #000;
}
.banner1-image {
  background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.3)),url(./orgfeed.jpg.png);
  background-repeat: no-repeat;
  background-size: 100% 100%;
  background-attachment:scroll;
  padding: 80;
  height: 20%;
}
strong {
  font-weight: bold;
  color: #000;
}
.row-container {
  display: block;
  margin-top: 10px;
  padding: 10px;
  text-shadow: 0 0 5px rgba(255, 192, 203, 1.0);
  background-color: #09090a;
  border: 1px solid #ccc;
  border-radius: 5px;
  color: #09090a
}

.login-form {
  background-color: #337ab7;
  padding: 15px; 
  color: #000;
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organization Feed</title>
    <link rel="stylesheet" href="OrganizationFeed.css">

</head>
<body>
    <header>
        <nav>
            <a href="home.html">Home</a>
            <a href="login.html">Login</a>
            <a href="signup.html">Signup  .</a>
            <label for="email">.  Email:</label>
            <span id="emailDisplay"></span>
        </nav>
        <form method="post">
            <div class="header-buttons">
                <button class="view-profile-button" type="button" onclick="viewProfile()">View Profile</button>
                <button class="log-out-button" type="submit" name="logout">Log Out</button>
            </div>
        </form>
    </header>

    <footer>
        <a href="#">Terms of Service</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Contact Us</a>
        <span>&copy; <script>document.write(new Date().getFullYear())</script> Volunteer Management System</span>
    </footer>
    
<div class="banner1-image">
<div class="container">
            <div class="login-form">
                <button type="button" onclick="createPost()">Create_post</button>
                <button type="button" onclick="application()">Applications</button>
                <button type="button" onclick="vlist()">Volunteers_list</button>
            </div>
</div>
            
    </div>
        <?php
session_start();
$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "orgvms";
$email=$_SESSION['email'];
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = $sql = "SELECT eventname,eventdate,eventtime,eventduration,eventlocation,noofvolunteers,managername,contactdetails,eventdescription,eventpurpose FROM createpost123 WHERE email = '$email' AND eventname IS NOT NULL AND eventname <> '' ORDER BY inc_id DESC";
$result = $conn->query($query);
if ($result) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="row-container">';
        echo '<div class="banner-image">';
        echo "Event Name: " . $row["eventname"] . "<br>";
        echo "Event Date: " . $row["eventdate"] . "<br>";
        echo "Event Time: " . $row["eventtime"] . "<br>";
        echo "Event Duration: " . $row["eventduration"] . "<br>";
        echo "Event Location: " . $row["eventlocation"] . "<br>";
        echo "No of volunteers: " . $row["noofvolunteers"] . "<br>";
        echo "Manager Name: " . $row["managername"] . "<br>";
        echo "Contact Details: " . $row["contactdetails"] . "<br>";
        echo "Event Description: " . $row["eventdescription"] . "<br>";
        echo "Event Purpose: " . $row["eventpurpose"] . "<br>";
        echo '</div>';
        echo '</div>';
       
    }

} else {
    echo "No rows found in the database.";
}
$conn->close();
if (isset($_POST['logout'])) {
    $_SESSION = array();
    session_destroy();
    header("Location: login.html");
    exit();
}
?>
    </div>
</body>
</html>
<script>
            var emailnameDisplay = document.getElementById("emailDisplay");
            var emailVariable = "<?php echo $_SESSION['email'];; ?>";
            emailDisplay.innerHTML = emailVariable;

        function createPost() {
            window.location.href = "create.html";
        }
        function application() {
            window.location.href = "application.php";
        }
        function viewProfile() {
            window.location.href = "ViewOrgProfile.php"; 
        }
        function vlist() {
            window.location.href = "volunteerList.php"; 
        }   
</script>

