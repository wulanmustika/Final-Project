<?php
include('db.php');

$sql = "SELECT rentals.id, customers.name as customer_name, electronics.name as item_name, rentals.rental_date, rentals.status 
        FROM rentals
        JOIN customers ON rentals.customer_id = customers.id
        JOIN electronics ON rentals.electronics_id = electronics.id";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Transactions</title>
</head>
<body>
    <h1>Rental Transactions</h1>
    <table border="1">
        <tr>
            <th>Transaction ID</th>
            <th>Customer</th>
            <th>Item</th>
            <th>Rental Date</th>
            <th>Status</th>
        </tr>

        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['customer_name']; ?></td>
            <td><?php echo $row['item_name']; ?></td>
            <td><?php echo $row['rental_date']; ?></td>
            <td><?php echo $row['status']; ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>