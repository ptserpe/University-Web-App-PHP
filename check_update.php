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
<center>

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

// Take necessary arguments for sql query
$title = $_POST['course'];
$username = $_POST['username'];
// check if given teacher is teaching the given course in order to change the grade to a student
$sql1 = "SELECT * FROM Teaches WHERE username='$username' AND title='$title'";
$result = mysqli_query($conn, $sql1);

// if result of query is not empty, then go to the file that changes the grade
if (mysqli_num_rows($result)) {

    echo "<button type=\"submit\" onclick=\"document.getElementById('id02').style.display='block'\"><b>Enter grade of a student in specific course</b></button>
    <div id=\"id02\" class=\"modal\">
    <form class =\"modal-content animate\" action=\"update_grade.php\">
      <div class=\"container\">
        <div class=\"imgcontainer\">
          <span onclick=\"document.getElementById('id02').style.display='none'\" class=\"close\" title=\"Close Modal\">&times;</span>
        </div>
        <div class=\"container\">
          <label for=\"course\"><b>Enter username of student: </b></label>
          <br>
          <input type=\"text\" method=\"get\" placeholder=\"Enter username\" name=\"username\" required></input>
          <br>
          <label for=\"course\"><b>Enter grade: </b></label>
          <br>
          <input type=\"text\" method=\"get\" placeholder=\"Enter grade\" name=\"grade\" required></input>
          <br>

          <button type=\"submit\" method=\"get\" name=\"title\" value=\"$title\" style=\"width:auto;\">Ready</button>
        </div>
      </div>
    </form>
    </div>";
} else {
    echo "<center><b>This teacher is not teaching the specific course</b></center> <br>";
}

mysqli_close($conn);

?>

<center>
<button type = "submit" style="background-color:#EC8903" onclick="goBack()"><b>Go Back<b></button>
</center>

<script>
function goBack() {
    window.history.back();
}
</script>

</body>
</html>
