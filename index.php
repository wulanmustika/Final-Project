<?php
include('db.php');
$sql = "SELECT * FROM electronics WHERE stock > 0";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental System</title>
</head>
<body>
    <h1>Welcome to ZH@BRYN Computer</h1>
    <h2>Available Electronics for Rent</h2>
    <table border="1">
        <tr>
            <th>Item Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Action</th>
        </tr>

        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['stock']; ?></td>
            <td><a href="rent.php?id=<?php echo $row['id']; ?>">Rent</a></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>