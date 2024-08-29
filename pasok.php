<?php
include 'database.php'; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $barcode = $_POST['barcode'];
    $created_at = date('Y-m-d H:i:s'); // Current timestamp
    $updated_at = $created_at;         // Same as created_at for new records

    // Insert data into tbl_product
    $sql = "INSERT INTO tbl_product (name, description, price, quantity, barcode, created_at, updated_at) 
            VALUES ('$name', '$description', '$price', '$quantity', '$barcode', '$created_at', '$updated_at')";

    if ($conn->query($sql) === TRUE) {
        echo "New product added successfully";
        // Redirect back to the main page to refresh the table
        header('Location: index.php'); // Replace 'index.php' with your main file name
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
