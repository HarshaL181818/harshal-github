
<?php
  session_start();
?>
<link rel="stylesheet" href="OrganizationSignup.css">

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
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "orgvms";
            $conn = new mysqli($servername, $username, $password, $dbname);
            $fetchemail = $_SESSION['email'];

            // Check for errors in the database connection
            if ($conn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
            }

                $sql = "SELECT account_type,orgname,liscense,address,contact,orgtype,email FROM signup WHERE email = '$fetchemail'";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                     while ($row = mysqli_fetch_assoc($result)) {
                        $account_type = $row['account_type'];
                        $orgname = $row['orgname'];
                        $liscense = $row['liscense'];
                        $address = $row['address'];
                        $contact = $row['contact'];
                        $orgtype = $row['orgtype'];
                        $email = $row['email'];
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
        <divclass="banner-image"> 
        <div class="login-form">
          <h2>Your Account details are</h2>
          <form action="ViewOrgProfile.php" method="post">
          
            <label for="account_type">Account type: <span id="account_typeDisplay"></span></label>
            <label for="orgname">Organization Name no: <span id="orgnameDisplay"></span></label>
            <label for="liscence">Liscence no: <span id="liscenseDisplay"></span></label>
            <label for="address">Address : <span id="addressDisplay"></span></label>
            <label for="contact">Contact : <span id="contactDisplay"></span></label>
            <label for="orgtype">Organization Type : <span id="orgtypeDisplay"></span></label>
          </form>
        </div>
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
        var emailDisplay = document.getElementById("emailDisplay");
        var emailVariable = "<?php echo $email; ?>";
        emailDisplay.innerHTML = emailVariable;
        
        var account_typeDisplay = document.getElementById("account_typeDisplay");
        var account_typeVariable = "<?php echo $account_type; ?>";
        account_typeDisplay.innerHTML = account_typeVariable;
        
        var orgnameDisplay = document.getElementById("orgnameDisplay");
        var orgnameVariable = "<?php echo $orgname; ?>";
        orgnameDisplay.innerHTML = orgnameVariable;

        var liscenseDisplay = document.getElementById("liscenseDisplay");
        var liscenseVariable = "<?php echo $liscense; ?>";
        liscenseDisplay.innerHTML = liscenseVariable;

        var addressDisplay = document.getElementById("addressDisplay");
        var addressVariable = "<?php echo $address; ?>";
        addressDisplay.innerHTML = addressVariable;

        var contactDisplay = document.getElementById("contactDisplay");
        var contactVariable = "<?php echo $contact; ?>";
        contactDisplay.innerHTML = contactVariable;

        var orgtypeDisplay = document.getElementById("orgtypeDisplay");
        var orgtypeVariable = "<?php echo $orgtype; ?>";
        orgtypeDisplay.innerHTML = orgtypeVariable;

        function viewProfile() {
            window.location.href = "ViewOrgProfile.php"; 
        }
    </script>