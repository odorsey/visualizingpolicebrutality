<?php include("connection.php");

/*Second query: Number of deaths per year*/
$query = "SELECT * from victim";

$data = array(); //setting up an emtpy PHP array for the data to go into

if($result = mysqli_query($db,$query)) {
  while ($row = mysqli_fetch_assoc($result))
  {
    $data[] = $row;
  }
}

echo json_encode($data, JSON_UNESCAPED_SLASHES);
