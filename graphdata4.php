<?php include("connection.php");

/*Fourth Query: number of killed and not killed incidents per police department
for group bar chart on Aftermanth*/
$query4 = "SELECT policeDepartment, sum(killed='Y') as numberKilled, sum(killed='N') as numberInjured
FROM incident, victim
WHERE incident.incidentID = victim.incidentID GROUP BY policeDepartment";

$data4 = array(); // setting up empty PHP array for the data to go into

if($result = mysqli_query($db,$query4)) {
  while ($row = mysqli_fetch_assoc($result))
  {
    $data4[] = $row;
  }
}

echo json_encode($data4, JSON_PRETTY_PRINT);
