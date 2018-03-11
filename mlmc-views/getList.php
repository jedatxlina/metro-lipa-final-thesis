<?php
require("getData/connection.php");


// Start XML file, create parent node

$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);


// Select all the rows in the markers table

$query = "SELECT * FROM patients WHERE 1";
$result = mysqli_query($con,$query);
if (!$result) {
  die('Invalid query: ' . mysqli_error());
}


header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each

while ($row = @mysqli_fetch_assoc($result)){
    // Add to XML document node
    $node = $dom->createElement("marker");
    $newnode = $parnode->appendChild($node);
    $newnode->setAttribute("admissionid",$row['AdmissionID']);
    $newnode->setAttribute("firstname",$row['FirstName']);
    $newnode->setAttribute("address", $row['CompleteAddress']);
    $newnode->setAttribute("lat", $row['latcoor']);
    $newnode->setAttribute("lng", $row['longcoor']);
  }
  
  echo $dom->saveXML();
  
?>