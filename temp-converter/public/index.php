<?php

require_once __DIR__ . '/../src/TemperatureConverter.php';

$celsius = '';
$fahrenheit = null;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $celsius = trim($_POST['celsius'] ?? '');

    if ($celsius === '') {
        $error = 'Please enter a Celsius value.';
    } elseif (!is_numeric($celsius)) {
        $error = 'Please enter a valid number.';
    } else {
        $fahrenheit = TemperatureConverter::celsiusToFahrenheit((float)$celsius);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celsius to Fahrenheit Converter</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Celsius to Fahrenheit</h1>
        <p class="subtitle">Simple PHP temperature converter</p>

        <form method="post" action="">
            <label for="celsius">Celsius</label>
            <input
                type="text"
                id="celsius"
                name="celsius"
                placeholder="e.g. 25"
                value="<?= htmlspecialchars($celsius) ?>"
            >
            <button type="submit">Convert</button>
        </form>

        <?php if ($error): ?>
            <div class="message error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <?php if ($fahrenheit !== null): ?>
            <div class="message success">
                <?= htmlspecialchars($celsius) ?> °C = <?= round($fahrenheit, 2) ?> °F
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
