<?php
echo "<h1>Hello World</h1>";
$ch = curl_init();
//sset url
curl_setopt($ch, CURLOPT_URL, "https://githubusercontent.com/xyefimenko/webTe/blob/master/index.php");
//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

//output contains the output string
$output = curl_exec($ch);
$output = mb_convert_encoding($output, 'UTF-8', "UTF-16LE");
//close curl resource to free system res
curl_close($ch);

$lines = explode(PHP_EOL, $output);
$csv = [];

foreach ($lines as $line) {
    $csv[] = str_getcsv($line, "\t");
}

echo bin2hex($output);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zadanie 4</title>
</head>
<body>

<pre>
    <?php
        var_dump($csv);
    ?>
</pre>

</body>
</html>
