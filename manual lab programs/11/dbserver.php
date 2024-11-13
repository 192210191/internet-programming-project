<?php 
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname="jai"; 
if ($_POST) 
{ 
$conn = new mysqli($servername, $username, $password, $dbname); 
$sql = "SELECT * FROM student WHERE regno =".$_POST["reg"]; 
$result = $conn->query($sql); 
while($row = $result->fetch_assoc()) { 
    echo "Reg Number: " . $row["regno"]. " - Name: " . $row["name"]. " -Gender: " . 
$row["gender"]."- Age: " .$row["age"]. "<br>"; 

 
} 
} 
?> 