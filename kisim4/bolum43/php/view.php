<?php 
$servername = getenv('DB_SERVER');
$username = getenv('DB_USERNAME');
$password = getenv('DB_PASS');
$dbname = getenv('DB_NAME');
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql 	= 'SELECT * FROM visitors';
$query 	= mysqli_query($conn, $sql);
while ($info = mysqli_fetch_array($query))
{ 
Echo "<img src=http://127.0.0.1/images/".$info['photo'] ."> <br>"; 
Echo "<b>Foto:</b> ".$info['photo'] . "<br> ";
Echo "<b>Name:</b> ".$info['name'] . "<br> "; 
Echo "<b>Email:</b> ".$info['email'] . " <br>"; 
Echo "<b>Phone:</b> ".$info['phone'] . " <hr>"; } 
?>
