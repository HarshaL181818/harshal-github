
<?php
session_start();
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "orgvms";

$email = $_SESSION['email'];

$eventname = filter_input(INPUT_POST, 'eventname');
$eventdate = filter_input(INPUT_POST, 'eventdate');
$eventtime = filter_input(INPUT_POST, 'eventtime');
$eventduration = filter_input(INPUT_POST, 'eventduration');
$eventlocation = filter_input(INPUT_POST, 'eventlocation');
$noofvolunteers = filter_input(INPUT_POST, 'noofvolunteers');
$managername = filter_input(INPUT_POST, 'managername');
$contactdetails = filter_input(INPUT_POST, 'contactdetails');
$eventdescription = filter_input(INPUT_POST, 'eventdescription');
$eventpurpose = filter_input(INPUT_POST, 'eventpurpose');

$conn = new mysqli($servername, $dbusername, $dbpassword,$dbname);
if (empty($eventname) || empty($eventdate)) {
    die("Event name and date are required.");
} else {
    $sql = "INSERT INTO createpost123 (email, eventname, eventdate, eventtime, eventduration, eventlocation, noofvolunteers, managername, contactdetails, eventdescription, eventpurpose) 
    values ('$email', '$eventname', '$eventdate', '$eventtime', '$eventduration', '$eventlocation', '$noofvolunteers', '$managername', '$contactdetails', '$eventdescription', '$eventpurpose')";
    if($conn->query($sql)){
        echo "Data added succesfully";
    }
    else{
        echo "Failed";
    }
}

$conn->close();
?>

  <script>
    var emailnameDisplay = document.getElementById("emailDisplay");
    var emailVariable = "<?php echo $_SESSION['email'];; ?>";
    emailDisplay.innerHTML = emailVariable;

   
</script>
