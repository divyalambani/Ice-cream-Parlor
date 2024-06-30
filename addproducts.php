<?php
$page='menu';
?>
<?php
require('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Icecream-Parlour</title>
    <link rel="icon" type="image/x-icon" href="logo.ico">
<link rel="stylesheet" href="home.css">
</head>
<body class="body">
<?php include ('nav.php'); ?>
<h1 class="heading">Icecream Parlour</h1>
<div class="product-box">
<?php $flavours = $con->query("SELECT * FROM flavours");?>
        <?php while ($row = $flavours->fetch_assoc()) { ?>
            <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>" width="100">
        <?php echo $row['name']; ?><br>
        <?php echo $row['price']; ?>
        </div>
        <?php 
        }
        ?>
    <?php $con->close(); ?>
</body>
</html>