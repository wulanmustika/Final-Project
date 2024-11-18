<?php
include('db.php');

if(isset($_GET['id'])) {
    $electronics_id = $_GET['id'];
    $customer_id = 1; // Static customer ID for simplicity, this can be dynamic
    $rental_date = date('Y-m-d H:i:s');
    $status = 'Rented';

    // Insert rental transaction
    $sql = "INSERT INTO rentals (customer_id, electronics_id, rental_date, status) VALUES ('$customer_id', '$electronics_id', '$rental_date', '$status')";
    if ($conn->query($sql) === TRUE) {
        // Update stock in electronics table
        $updateStock = "UPDATE electronics SET stock = stock - 1 WHERE id = '$electronics_id'";
        if ($conn->query($updateStock) === TRUE) {
            echo "Rental successful!";
        } else {
            echo "Error updating stock: " . $conn->error;
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>