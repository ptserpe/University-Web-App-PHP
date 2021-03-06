<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 20%;
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
  width: 30%;
}

/* Set a style for all buttons */
button {
  background-color:SlateBlue;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 30%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: Red;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)}
  to {-webkit-transform: scale(1)}
}

@keyframes animatezoom {
  from {transform: scale(0)}
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: auto;
  }
}
</style>
</head>
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

$username = $_POST['username'];
$password = $_POST['password'];

// sql to create table
$sql = "SELECT firstname ,lastname FROM Students WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $sql);

if ($result) {
  if(mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_assoc($result);

    echo "<center><b> Welcome " . $row['firstname']. " " . $row['lastname']. "</b><br>";

    //echo ta choices (enrollment, view courses, view professors, view profile)

    echo "<b>Please choose an option:</b> <br>";

    echo " <form method = \"get\" action=\"enroll.php\"> <button type=\"submit\" /><b>Enroll in course</b></button></form>";

    echo " <form method=\"post\" action=\"view_grades.php\" ><button type =\"submit\" method =\"post\" name=\"username\" value=\"$username\"><b>View my grades</b></button></form>";

    echo " <form method = \"post\" action=\"view_profile.php\"> <button type=\"submit\" method=\"post\" name=\"username\" value=\"$username\"/><b>View my profile</b></button></form>";

    echo " <form method = \"post\" action=\"view_teachers_profile.php\"> <button type=\"submit\" method=\"post\" name=\"username\" value=\"$username\" /><b>View profiles of teachers that teach my courses</b></button></form>";

    echo " <form action=\"select_all_courses.php\"> <button type=\"submit\"/><b>View all available Courses</b></button></form>";

    echo " <form method=\"post\" action=\"view_my_courses.php\"> <button type=\"submit\" method=\"post\" name=\"username\" value=\"$username\"/><b>View my courses</b></button></form> ";

    echo "<form action=\"app.html\"> <button type=\"submit\" style=\"background-color:#EC8903\" /><b>Logout</b></button></form></center>";

  } else {
      echo "User not found <br>";
  }
}
else {
    echo "Error finding user " . mysqli_error($conn);
}


mysqli_close($conn);
?>


</body>
</html>
