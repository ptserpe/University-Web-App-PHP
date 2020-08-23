<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 30%;
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
  width: 130px;
}

/* Set a style for all buttons */
button {
  background-color: SlateBlue;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
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

$course = $_POST['course'];

$sql = "SELECT T.firstname, T.lastname FROM Teaches TS, Teachers T WHERE T.username = TS.username AND TS.title = '$course'";
$result = mysqli_query($conn, $sql);

if ($result) {
  if(mysqli_num_rows($result) > 0) {

    echo "<center><h2><b>The teacher teaching this course is: </b></h2> <br>";
    echo "<table>";
    echo "<tr><th>Firstname</th><th>Lastname</th></tr>";
    $row = mysqli_fetch_assoc($result);
    echo "<tr><td>" . $row['firstname'] . "</td><td>". $row['lastname'] . "</td><tr>";

    echo "</table>";
  } else {
      echo "<b>No teacher found</b><br>";
  }
}else {
  echo "Error finding teacher: " . mysqli_error($conn);
}

mysqli_close($conn); ?>

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
