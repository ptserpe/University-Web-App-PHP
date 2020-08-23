<html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

th{
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
  background-color: SlateBlue;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  color: white;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
button[type=submit]{
  background-color: SlateBlue;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: 1px solid #ccc;
  box-sizing: border-box;
  cursor: pointer;
  width: 50%;
}

/* Set a style for all buttons */
button {
  background-color: SlateBlue;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;
}

button:hover {
  opacity: 0.8;
}

</style>
</head>
<head> <title> Signup </title> </head>
<body style="background-color:LightGray">

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db2";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$table = $_GET['Table'];

// get values from browser
$firstname = $_GET['firstname'];
$lastname = $_GET['lastname'];
$username = $_GET['username'];
$password = $_GET['password'];
$passwordcheck = $_GET['passwordcheck'];
$email = $_GET['email'];
$semester = $_GET['semester'];

if ($password != $passwordcheck) {
    echo "Passwords do not mach. Try again!";
} else {

  // sql to create table
  $sql = "INSERT INTO Students (firstname ,lastname, username, password, email, semester) VALUES ('$firstname', '$lastname', '$username', '$password', '$email', '$semester')";

  if (mysqli_query($conn, $sql)) {
      echo "<center><b>New student created successfully</b></center>";
  } else {
      echo "<center><b>Error creating student: " . mysqli_error($conn) . "</b></center>";
  }
}

// UPDATE VIEW
mysqli_close($conn);
?>
<center>
<button style="background-color:#EC8903" onclick="goBack()"><b>Go Back</b></button>
</center>
<script>
function goBack() {
    window.history.back();
}
</script>

</body>
</html>
