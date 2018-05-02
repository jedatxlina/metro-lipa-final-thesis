<?php
require("getData/connection.php");


// Start XML file, create parent node

$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);


// Select all the rows in the markers table
$query = "SELECT DISTINCT(diagnosis.Findings) as Conditions, count(diagnosis.Findings) as count,patients_archive.ArchiveID,patients_archive.CompleteAddress,patients_archive.latcoor,patients_archive.longcoor FROM diagnosis JOIN patients_archive WHERE patients_archive.MedicalID = diagnosis.MedicalID GROUP BY Findings";
$result = mysqli_query($conn,$query);

// SELECT MedicalID,Conditions,( SELECT COUNT(Conditions) FROM medical_conditions) AS count FROM medical_conditions as temp
header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each

while ($row = @mysqli_fetch_assoc($result)){
    // Add to XML document node
    $node = $dom->createElement("marker");
    $newnode = $parnode->appendChild($node);
    $newnode->setAttribute("admissionid",$row['ArchiveID']);
    $newnode->setAttribute("address", $row['CompleteAddress']);
    $newnode->setAttribute("conditions", $row['Conditions']);
    $newnode->setAttribute("lat", $row['latcoor']);
    $newnode->setAttribute("lng", $row['longcoor']);
    $newnode->setAttribute("cnt", $row['count']);
  }
  
  echo $dom->saveXML();
  
?>