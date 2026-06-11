<?php
$result = "";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $celsius = $_GET["c"];

    if ($celsius !== "" && is_numeric($celsius)) {
        $fahrenheit = ($celsius * 9 / 5) + 32;
        $result = $celsius . " °C = " . $fahrenheit . " °F";
    } else {
        $result = "Please enter a valid number.";
    }
} else {
    $result = "No value received.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <div class="container">
        <title>Result</title>
</head>
<body>
    <h1>Result</h1>

    <p><?php echo $result; ?></p>

    <a href="temp.php">
        <button>Back</button>
    </a>
    </div>
</body>
</html>
