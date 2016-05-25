<?php include("connection.php");

/*Third Query: number of incidents per state for bar graph on The Initial Build-up*/
$query3 = "SELECT state, COUNT(incidentID) as amount from incident GROUP BY state";

$data3 = array(); //setting up an empty PHP array for the data to go into

if($result = mysqli_query($db,$query3)) {
  while ($row = mysqli_fetch_assoc($result))
  {
    $data3[] = $row;
  }
}

echo json_encode($data3, JSON_PRETTY_PRINT);
