<?php

header('Content-Type: application/json');
require_once "classes/helper/Database.php";

$ch = curl_init("https://raw.githubusercontent.com/xyefimenko/webTe/master/20210406_AttendanceList_WebTe2.csv");
//sset url
//curl_setopt($ch, CURLOPT_URL,   true);
//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//output contains the output string
$output = curl_exec($ch);
//close curl resource to free system res
curl_close($ch);

$output = mb_convert_encoding($output, 'UTF-8', "UTF-16LE");

$lines = explode(PHP_EOL, $output);
//$csv = [];

$conn = (new Database())->getConnection();

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("INSERT INTO user_actions (lecture_id, user_id, action, timestamp)
 VALUES ('1', :user_id, :action, :timestamp);");

$stmt2 = $conn->prepare("INSERT IGNORE INTO users (name) VALUES (:name);");

$stmt->bindParam(":user_id", $userId);
$stmt->bindParam(":action", $action);
$stmt->bindParam(":timestamp", $timestamp);
$stmt2->bindParam(":name", $name);

foreach ($lines as $index => $line) {

    //inset row
    if ($index > 0 && $index < (sizeof($lines) - 1)) {
        $lineArray = str_getcsv($line, "\t");

        $name = $lineArray[0];
        $stmt2->execute();


        $sql = "SELECT id from users where name = '$lineArray[0]'";
        $result = $conn->prepare($sql);

        $userId = $result->fetchColumn();
        echo "$userId";
        $action = $lineArray[1];
        $timestamp = date("Y-m-d H:i:s", date_create_from_format('d/m/Y, H:i:s', $lineArray[2])->getTimestamp());
        $stmt->execute();

    }

}

echo json_encode(["status" => "success", "msg" => "Added" . sizeof($lines) . "lines"]);


?>

