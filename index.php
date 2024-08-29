<?php
include 'database.php'; // Include the database connection
date_default_timezone_set('Asia/Manila'); // correct timezone

// Fetch data from the `tbl_product` table
$sql = "SELECT * FROM tbl_product";
$result = $conn->query($sql);
?>
<style>
    .btn {
        display: inline-block;
        padding: 8px 12px;
        margin: 0 4px;
        font-size: 14px;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        outline: none;
        color: #fff;
        background-color: #0000FF; /* blu */
        border: none;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }
    .btn:hover {
        background-color: #45a049;
    }
    .btn-danger {
        background-color: #f44336; /* Red */
    }
    .btn-danger:hover {
        background-color: #e31b0c;
    }
</style>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>

    <!-- Display the Table -->
    <h2>Product List</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Barcode</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['barcode']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>
                        <td><?php echo $row['updated_at']; ?></td>
                        <td>
    <!-- Update Button -->
    <a href="baguhin.php?id=<?php echo $row['id']; ?>">
        <button class="btn">Update</button>
    </a>

    <!-- Delete Button -->
    <a href="bura.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this item?');">
        <button class="btn btn-danger">Delete</button>
    </a>
</td>

                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9">No records found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- User Input Form -->
    <h2>Add New Product</h2>
    <form action="pasok.php" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="description">Description:</label><br>
        <input type="text" id="description" name="description" required><br><br>

        <label for="price">Price:</label><br>
        <input type="number" id="price" name="price" required><br><br>

        <label for="quantity">Quantity:</label><br>
        <input type="number" id="quantity" name="quantity" required><br><br>

        <label for="barcode">Barcode:</label><br>
        <input type="text" id="barcode" name="barcode" required><br><br>

        <button type="submit" class="btn" style="background-color: #4CAF50; color: white; padding: 10px 20px; border-radius: 4px;">Add Product</button>


    </form>

</body>
</html>

<?php
$conn->close(); // Close the database connection
?>
