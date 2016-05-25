<?php include ('connection.php');

//query database for coordinates
$query = "SELECT * FROM incident, victim WHERE incident.incidentID = victim.incidentID";
//converting the data from mySQL to PHP

$data = array(); //setting up an emtpy PHP array for the data to go into

if($result = mysqli_query($db,$query)) {
  while ($row = mysqli_fetch_assoc($result))
  {
    $data[] = $row;
  }
}
?>

<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
