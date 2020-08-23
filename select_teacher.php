<!DOCTYPE html>
<html>
<head>
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
  background-color: SlateBlue;
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
  background-color: SlateBlue;
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
     width: 100%;
  }
}
</style>
</head>

<head> <title> Login </title> </head>
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
$sql = "SELECT firstname ,lastname FROM Teachers WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $sql);

if ($result) {
  if(mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_assoc($result);

    echo "<center><b>Welcome " . $row['firstname']. " " . $row['lastname']. "<br>";

    echo " <form method = \"post\" action=\"view_teacher_profile.php\"> <button type=\"submit\" method=\"post\" name=\"username\" value=\"$username\"><b>View my profile</b>
    </button></form>";
    echo " <form method = \"post\" action=\"view_my_teaching_courses.php\"> <button type=\"submit\" method=\"post\" name=\"username\" value=\"$username\"><b>View courses I teach</b>
    </button></form>";

    echo "<button type=\"submit\" method=\"post\" onclick=\"document.getElementById('id01').style.display='block'\"><b>Show the number of students in specific course</b></button>
    <div id=\"id01\" class=\"modal\">
    <form class =\"modal-content animate\" method=\"post\"  action = \"select_num_of_students_in_course.php\">
      <div class=\"container\">
        <div class=\"imgcontainer\">
          <span onclick=\"document.getElementById('id01').style.display='none'\" class=\"close\" title=\"Close Modal\">&times;</span>
        </div>
        <div class=\"container\">
          <label for=\"course\"><b>Enter course title: </b></label>
          <br>
          <input type=\"text\" placeholder=\"Enter title\" name=\"course\" required></input>
          <br>
          <button type=\"submit\"style=\"width:auto;\">Ready</button>
        </div>
      </div>
    </form>
    </div>
    <br>
    <button onclick=\"document.getElementById('id02').style.display='block'\"><b>Enter title of the course you want to update a grade</b></button>
    <div id=\"id02\" class=\"modal\">
    <form class =\"modal-content animate\" method=\"post\" action=\"check_update.php\">
      <div class=\"container\">
        <div class=\"imgcontainer\">
          <span onclick=\"document.getElementById('id02').style.display='none'\" class=\"close\" title=\"Close Modal\">&times;</span>
        </div>
        <div class=\"container\">
          <label for=\"course\"><b>Enter course title: </b></label>
          <br>
          <input type=\"text\" method=\"post\" placeholder=\"Enter title\" name=\"course\" required></input>
          <br>
          <button type=\"submit\" method=\"post\" name=\"username\" value=\"$username\" style=\"width:auto;\">Ready</button>
        </div>
      </div>
    </form>
    </div>
    <br>
    <script>
    var modal = document.getElementById('id01');
    var modal2 = document.getElementById('id02');
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = \"none\";
        }
    }
    window.onclick = function(event) {
        if (event.target == modal2) {
            modal2.style.display = \"none\";
        }
    }
    </script>";
    echo "<form action=\"app.html\"> <button type=\"submit\" style=\"background-color:#EC8903\" /><b>Logout</b></button></form></center>";


  } else {
      echo "User not found";
  }
}
else {
    echo "Error creating course: " . mysqli_error($conn);
}


mysqli_close($conn);
?>

</body>
</html>
