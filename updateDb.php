<?php

header('Content-Type: application/json');
require_once "Database.php";

$ch = curl_init();
//sset url
curl_setopt($ch, CURLOPT_URL, "https://raw.githubusercontent.com/xyefimenko/webTe/master/20210216_AttendanceList_WebTe2.csv");
//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

//output contains the output string
$output = curl_exec($ch);
$output = mb_convert_encoding($output, 'UTF-8', "UTF-16LE");
//close curl resource to free system res
curl_close($ch);

$lines = explode(PHP_EOL, $output);
$csv = [];

$conn = (new Database())->getConnection();

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("INSERT INTO user_actions (lecture_id, name, action, timestamp)
 VALUES ('1', :name, :action, :timestamp)");
$stmt->bindParam(":name", $name);
$stmt->bindParam(":action", $action);
$stmt->bindParam(":timestamp", $timestamp);

foreach ($lines as $index => $line) {
    $lineArray = str_getcsv($line, "\t");

    //inset row
    if ($index > 0 && ($lineArray[0])) {
//        print_r($lineArray);
//        echo "<br>";
        $name = $lineArray[0];
        $action = $lineArray[1];
        $timestamp = date("Y-m-d H:i:s", date_create_from_format('d/m/Y, H:i:s', $lineArray[2])->getTimestamp());
        $stmt->execute();
    }

}

echo json_encode(["status" => "success", "msg" => "Added" . sizeof($lines) . "lines"]);
?>

