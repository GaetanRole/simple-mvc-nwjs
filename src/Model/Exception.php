<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>Exception</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>
<?php
echo '<div class="container">'. $e->getMessage() . '<br>';
echo '<a href="/" class="btn">Back to /</a></div>';
?>
</body>
</html>
