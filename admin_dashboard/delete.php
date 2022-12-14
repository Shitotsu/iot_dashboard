<?php
require '../config.php';
$id = $_GET['id'];
$name = $_GET['name'];
$string = str_replace(' ', '_', $name);

if (delete_product($id) > 0){
    mysqli_multi_query($conn, "DROP TABLE pd_{$string}");
    echo "<script>alert('Successfully deleted product!');document.location='dashboard.php?action=back';</script>";

}else{
    echo "<script>alert('Failed to delete product!')</script>".mysqli_error($conn);
}
?>
