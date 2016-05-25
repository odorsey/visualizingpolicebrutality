<?php include ('connection.php');

//query database
$query = "SELECT * FROM incident, victim WHERE incident.incidentID = victim.incidentID ORDER BY dateTimestamp";

//converting the data from mySQL to PHP

$data = array(); //setting up an empty PHP array for the data to go into

if($result = mysqli_query($db,$query)) {
  while ($row = mysqli_fetch_assoc($result))
  {
    $data[] = $row;
  }
}

//$jsonData = json_encode($data); //transform array to json string!
//$original_data = json_decode($jsonData, true); //transform json string to create array
$features = array();

foreach($data as $key => $value) {
  $features[] = array(
      'type' => 'Feature',
      'properties' => array(
        'id' => $value['victimID'],
        'time' => $value['dateTimestamp'],
        'firstname' => $value['firstName'],
        'lastname' => $value['lastName'],
        'gender' => $value['sex'],
        'victimStatus' => $value['killed'],
        'age' => $value['age'],
        'locationDetails' => $value['locDetails'],
        'victimDesc' => $value['victimDesc'],
		'photo' => $value['photo']
        ),
      'geometry' => array(
           'type' => 'Point',
           'coordinates' => array(
                $value['longitude'],
                $value['latitude'],
                1
            ),
       ),
  ); //end of first array
} //ends foreach loop
$new_data = array(
  'type' => "FeatureCollection",
  'features' => $features,
);

$final_data = json_encode($new_data, JSON_UNESCAPED_SLASHES);

/*$newfile = fopen("mapdata.json", "w");
fwrite($newfile, $final_data);
fclose($newfile);*/


print_r($final_data);

?>
