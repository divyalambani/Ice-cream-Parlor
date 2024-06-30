<?php
require('config.php');

session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location:index.php');
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add'])) {
        $id=$_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];

        $target_dir = "";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $image = "";

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image= $target_file;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
        
        $sql = "INSERT INTO flavours (id,name,price,image) VALUES ('$id','$name', '$price', '$image')";
        $con->query($sql);
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        
        $sql = "DELETE FROM flavours WHERE id='$id'";
        $con->query($sql);
    }
}

$flavours= $con->query("SELECT * FROM flavours");
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body
            {
                background-color:#f1a7b7;
                background-image:url("images/header-1.png");
            }
            form {
    margin-bottom: 20px;
    padding: 10px;
    background-color:pink;
    border: 1px solid pink;
    border-radius: 5px;
}

form input[type="text"],
form input[type="number"],
form input[type="file"] {
    width: calc(60% - 22px);
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 5px;
}

form input[type="submit"] {
    background-color: pink;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

form input[type="submit"]:hover {
    background-color:rgb(228, 26, 76);
            };


            h1
            {
                text-align:center;
                color:rgb(228, 26, 76);
            }
            h2
            {
                color:rgb(228, 26, 76);
            }
      </style>  
    <title>Admin - Manage Icecream</title>
</head>
<body>
    <br>
    <h1>Manage Icecream</h1>
    
    <h2>Add New Icecream</h2>
    <form method="POST" enctype="multipart/form-data">
       <p> id:<input type="number" name="id" required></p><br>
        <p>Name: <input type="text" name="name" required></p><br>
      <p>  Price: <input type="text" name="price" required></p><br>
       Image URL: <input type="file" name="image" required><br>
        <input type="submit" name="add" value="Add Item">
    </form><br><br><br><br>

    <h2>Delete Icecream</h2>
    <form method="POST">
        Icecream ID: <input type="text" name="id" required><br>
        <input type="submit" name="delete" value="Delete item">
    </form><br>
<div style="background-color:pink;">
    <h2>Current Icecream flavours</h2>
    
        <?php while ($row = $flavours->fetch_assoc()) { ?>
            <div style="background-color:white; width:45%; border-radius:20px;padding:20px; border:1px solid pink; display:inline-block;">
            <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>" width="200">
            <h2><?php echo $row['name']; ?></h2>
            <h3 style="color:green;">  ₹<?php echo $row['price']; ?></h3> 
            <p style="color:blue">Ice cream ID: <?php echo $row['id']; ?></p>
        </div>
    
        <?php } ?>
        </div>
</body>
</html>

<?php $con->close(); ?>