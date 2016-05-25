<?php include("connection.php");

/*Fifth Query: number of cases in which one Officer is charged, more than one Officer is charged, there are no charges, the case is under investigation, the case is unknown, and there is a mistrial*/
$query5 = "SELECT result, COUNT(incidentID) as totalNumber from incident GROUP BY result";

$data5 = array(); // setting up empty PHP array for the data to go into

if($result = mysqli_query($db,$query5)) {
  while ($row = mysqli_fetch_assoc($result))
  {
    $data5[] = $row;
  }
}

echo json_encode($data5, JSON_PRETTY_PRINT);
