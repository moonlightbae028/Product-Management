<?php
include 'database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the current data of the selected product
    $sql = "SELECT * FROM tbl_product WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $barcode = $_POST['barcode'];

    // Update the data in the `tbl_product` table
    $sql = "UPDATE tbl_product SET name='$name', description='$description', price='$price', quantity='$quantity', barcode='$barcode', updated_at=NOW() WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Redirect back to the index page
    header("Location: index.php");
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
</head>
<body>

    <h2>Update Product</h2>
    <form action="baguhin.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required><br><br>

        <label for="description">Description:</label><br>
        <input type="text" id="description" name="description" value="<?php echo $row['description']; ?>" required><br><br>

        <label for="price">Price:</label><br>
        <input type="number" id="price" name="price" value="<?php echo $row['price']; ?>" required><br><br>

        <label for="quantity">Quantity:</label><br>
        <input type="number" id="quantity" name="quantity" value="<?php echo $row['quantity']; ?>" required><br><br>

        <label for="barcode">Barcode:</label><br>
        <input type="text" id="barcode" name="barcode" value="<?php echo $row['barcode']; ?>" required><br><br>

        <button type="submit" name="update" class="btn" style="background-color: #2196F3; color: white; padding: 10px 20px; border-radius: 4px;">Update Product</button>

        
    </form>

</body>
</html>
