<?php
require("getData/connection.php");


// Start XML file, create parent node

$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);


// Select all the rows in the markers table
$query = "SELECT a.AdmissionID,a.CompleteAddress,a.latcoor,a.longcoor,b.MedicalID,b.AdmissionID,c.Conditions FROM patients a,medical_details b, conditions c, medical_conditions d WHERE a.AdmissionID = b.AdmissionID AND b.MedicalID = d.MedicalID AND c.Conditions = d.Conditions";
$result = mysqli_query($conn,$query);


header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each

while ($row = @mysqli_fetch_assoc($result)){
    // Add to XML document node
    $node = $dom->createElement("marker");
    $newnode = $parnode->appendChild($node);
    $newnode->setAttribute("admissionid",$row['AdmissionID']);
    $newnode->setAttribute("address", $row['CompleteAddress']);
    $newnode->setAttribute("conditions", $row['Conditions']);
    $newnode->setAttribute("lat", $row['latcoor']);
    $newnode->setAttribute("lng", $row['longcoor']);
  }
  
  echo $dom->saveXML();
  
?>