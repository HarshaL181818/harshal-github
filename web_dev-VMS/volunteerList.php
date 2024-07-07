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
.sorting-container{
    display: inline-block; 
    padding: 5px; 
    border: 10px solid #337ab7; 
    border-radius: 10px;
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
           
    <div class="sorting-container">
    
    <span style="font-weight: bold; text-align: center;">Sort using</span>
    <form action="volunteerList.php" method="post">
    <label for="occupation">Occupation:</label>
<select name="occupation" id="occupation" required>
    <option value="all" <?php if (isset($_POST['occupation']) && $_POST['occupation'] == 'all') echo 'selected'; ?>>All</option>
    <option value="Student" <?php if (isset($_POST['occupation']) && $_POST['occupation'] == 'Student') echo 'selected'; ?>>Student</option>
    <option value="Graduate" <?php if (isset($_POST['occupation']) && $_POST['occupation'] == 'Graduate') echo 'selected'; ?>>Graduate</option>
    <option value="Homemaker" <?php if (isset($_POST['occupation']) && $_POST['occupation'] == 'Homemaker') echo 'selected'; ?>>Homemaker</option>
    <option value="Employed" <?php if (isset($_POST['occupation']) && $_POST['occupation'] == 'Employed') echo 'selected'; ?>>Employed</option>
    <option value="Retired" <?php if (isset($_POST['occupation']) && $_POST['occupation'] == 'Retired') echo 'selected'; ?>>Retired</option>
</select>
<br>
<label for="interest">Interest:</label>
<select id="interest" name="interest" required>
    <option value="all" <?php if (isset($_POST['interest']) && $_POST['interest'] == 'all') echo 'selected'; ?>>All</option>
    <option value="healthcare" <?php if (isset($_POST['interest']) && $_POST['interest'] == 'healthcare') echo 'selected'; ?>>Healthcare</option>
    <option value="education" <?php if (isset($_POST['interest']) && $_POST['interest'] == 'education') echo 'selected'; ?>>Education</option>
    <option value="animal-welfare" <?php if (isset($_POST['interest']) && $_POST['interest'] == 'animal-welfare') echo 'selected'; ?>>Animal Welfare</option>
    <option value="environment-conservation" <?php if (isset($_POST['interest']) && $_POST['interest'] == 'environment-conservation') echo 'selected'; ?>>Environment and Conservation</option>
    <option value="social-service" <?php if (isset($_POST['interest']) && $_POST['interest'] == 'social-service') echo 'selected'; ?>>Social Services</option>
    <option value="elderly-care" <?php if (isset($_POST['interest']) && $_POST['interest'] == 'elderly-care') echo 'selected'; ?>>Elderly Care</option>
    <option value="disability" <?php if (isset($_POST['interest']) && $_POST['interest'] == 'disability') echo 'selected'; ?>>Disability Services</option>
</select>


        <br>
        <input type="submit" value="Apply" style="margin-top: 10px; text-align:center">
    </form>
</div>

</div>

    <?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "orgvms";
$email = $_SESSION['email'];
$conn = new mysqli($servername, $username, $password, $dbname);
$occupation= filter_input(INPUT_POST, 'occupation');
$interest= filter_input(INPUT_POST, 'interest');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT `prefix`, `firstName`, `lastName`, `phoneNumber`, `email`, `address`, `city`, `state`, `postalCode`, `dateofbirth`, `occupation`, `interest` FROM `indsignup` WHERE email IS NOT NULL";

if ($occupation !== 'all' && $interest !== 'all') {
    $query .= " AND (interest='$interest' AND occupation='$occupation')";
}
else if($occupation !== 'all'){
    $query .= " AND occupation='$occupation'";
}
else if($occupation !== 'all'){
    $query .= " AND interest='$interest'";
}

$result = $conn->query($query);
if ($result) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="row-container">';
        echo '<div class="banner-image">';
        echo '<div class="row">';
        echo '<div class="info">';
        echo '<strong>' . $row["prefix"] . '</strong>';
        echo '<strong>' . $row["firstName"] . '</strong>';
        echo '<strong>' . $row["lastName"] . '</strong>';
        echo "<br> Phone no: " . $row["phoneNumber"] . "<br>";
        echo "Email: " . $row["email"] . "<br>";
        echo '</div>';
        echo '<div class="info">';
        echo "Address: " . $row["address"] . ", ";
        echo "" . $row["city"] . ", ";
        echo "" . $row["state"] . "- ";
        echo "" . $row["postalCode"] . "<br>";
        echo "Date of Birth: " . $row["dateofbirth"] . "<br>";
        echo "Occupation: " . $row["occupation"] . "<br>";
        echo "Interests: " . $row["interest"] . "<br>";
        echo '</div>';
        echo '</div>';
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
