<?php
$page='menu';
?>
<?php
require('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        h1
        {
            text-align:center;
            color:rgb(228, 26, 76);
        }
        .heading
        {
            color:#ec6464;
        }
        </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Icecream Parlour</title>
    <!--<link rel="icon" type="image/x-icon" href="logo.ico">-->
    <link rel="stylesheet" href="home.css">
<link rel="stylesheet" href="menu1.css">
</head>
<body class="body">
<?php include ('nav.php'); ?>
<br>
<br>
<!--<h1 class="heading"><b>Flavours</b></h1>-->
<h1><b>FLAVOURS</h1>
<?php $flavours = $con->query("SELECT * FROM flavours");?>
        <?php while ($row = $flavours->fetch_assoc()) { ?>
            <div class="product-item">
            <img class="product-image" src="<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>" width="100">
        <br><?php echo $row['name']; ?><br><br>
        ₹<?php echo $row['price']; ?>
        </div>
        <?php 
        }
        ?>
    <?php $con->close(); ?>
</body>
</html>