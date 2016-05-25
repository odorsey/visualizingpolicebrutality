<?php include("connection.php");

/*Queries for D3.js graphs are below */

/*First query: Number of ages per range across ALL incidents,
for donut chart on The Act of Brutality*/
$query = "SELECT sum(sex ='M') males, sum(sex ='F') females, CASE
	WHEN age BETWEEN 7 AND 15 THEN '7-15'
	WHEN age <= 24 THEN '16-24'
	WHEN age <= 33 THEN '25-33'
	WHEN age <= 42 THEN '34-42'
	WHEN age <= 51 THEN '43-51'
	WHEN age <= 52 THEN '52-60'
	WHEN age <= 70 THEN '61-70'
	END AS age,
	COUNT(*) AS totalNumber
FROM victim
GROUP BY CASE
	WHEN age <= 15 THEN '7-15'
	WHEN age <= 24 THEN '16-24'
	WHEN age <= 33 THEN '25-33'
	WHEN age <= 42 THEN '34-42'
	WHEN age <= 51 THEN '43-51'
	WHEN age <= 52 THEN '52-60'
	WHEN age <= 70 THEN '61-70'
	END";

$data = array(); //setting up an emtpy PHP array for the data to go into

if($result = mysqli_query($db,$query)) {
  while ($row = mysqli_fetch_assoc($result))
  {
    $data[] = $row;
  }
}


//function convert_to_csv($input_array, $output_file_name, $delimiter)
//{
    /** open raw memory as file, no need for temp files, be careful not to run out of memory though */
    //$newFile = "allAgesIncidents.csv";
    //$f = fopen($newFile, 'w') or die ("Can't open file.");

    /** loop through array  */
    //foreach ($input_array as $line) {
        /** default php csv handler **/
        //fputcsv($f, $line, $delimiter);
    //}
    /** rewrind the "file" with the csv lines **/
    //fseek($f, 0);

    /** Send file to browser for download */
    //fclose($newFile);
//}
//convert_to_csv($data, 'allAgesIncidents.csv', ',');

echo json_encode($data, JSON_PRETTY_PRINT);

?>
