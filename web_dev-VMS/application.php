<style>
.banner-image {
  background: url('your-image.jpg') center/cover no-repeat;
  padding: 20px; /* Adjust the padding to your preference */
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Add text shadow */
  color: #00008B;
  background-color : #f7f7f7;
}
strong {
  font-weight: bold;
  color: #000;
}


.row-container {
  display: block;
  margin-top: 10px;
  padding: 10px;
  background-color: #5bc0de;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
  color: #000;
  font-size: 16px;
}

.login-form {
  background-color: #337ab7;
  padding: 15px; 
  color: #000;
}

</style>
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
            
    </div>
<?php
session_start();
$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "orgvms";
$emailoforg=$_SESSION['email'];

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = $sql = "SELECT prefix,firstName,lastName,eventName,phoneNumber,email,address,city,state,postalCode,dateofbirth,occupation,interest,message FROM applied123 WHERE emailoforg = '$emailoforg' AND phoneNumber != '0' AND eventName <> '' ORDER BY inc_id DESC";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0){

                while ($row = $result->fetch_assoc()) {
                    echo '<div class="row-container">';
                    echo '<div class="banner-image">';
                    echo '<strong>' . $row["prefix"] . '</strong>';
                    echo '<strong>' . $row["firstName"] . '</strong>';
                    echo '<strong>' . $row["lastName"] . '</strong> is interested and has applied for your event named ';
                    echo '<strong>' . $row["eventName"] . '</strong><br>';
                    echo "Their details are <br> Phone no:" . $row["phoneNumber"] . "<br>";
                    echo "Email: " . $row["email"] . "<br>";
                    echo "Address: " . $row["address"] . "<br>";
                    echo "State: " . $row["state"] . "<br>";
                    echo "City: " . $row["city"] . "<br>";
                    echo "" . $row["postalCode"] . "<br>";
                    echo "Date of Birth: " . $row["dateofbirth"] . "<br>";
                    echo "Occupation: " . $row["occupation"] . "<br>";
                    echo "Interests: " . $row["interest"] . "<br>";
                    echo '</div>';
                    echo '</div>';         
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
    </div>
</body>
</html>
<script>
var emailnameDisplay = document.getElementById("emailDisplay");
            var emailVariable = "<?php echo $_SESSION['email'];; ?>";
            emailDisplay.innerHTML = emailVariable;
function viewProfile() {
            window.location.href = "ViewOrgProfile.php"; 
        }
</script>