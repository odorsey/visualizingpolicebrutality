<?php include("connection.php");

/*Second query: Number of deaths per year*/
$query2 = "SELECT DATE(dateTimestamp) as dateyear, COUNT(incident.incidentID) as amount FROM victim, incident
WHERE incident.incidentID = victim.incidentID AND killed = 'Y'
GROUP BY YEAR(dateTimestamp)";

$data2 = array(); //setting up an emtpy PHP array for the data to go into

if($result = mysqli_query($db,$query2)) {
  while ($row = mysqli_fetch_assoc($result))
  {
    $data2[] = $row;
  }
}

echo json_encode($data2, JSON_PRETTY_PRINT);
