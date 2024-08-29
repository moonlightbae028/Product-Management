<?php
include 'database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the record from the `tbl_product` table
    $sql = "DELETE FROM tbl_product WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Redirect back to the index page
    header("Location: index.php");
}

$conn->close();
?>
