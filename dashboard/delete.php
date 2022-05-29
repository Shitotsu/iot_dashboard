<?php
require '../fungsi.php';
$id = $_GET['id'];

if (hapus_user($id) > 0){
    echo "<script>alert('user berhasil dihapus!');document.location='dashboard.php?action=back';</script>";
}else{
    echo "<script>alert('user gagal dihapus!');document.location='dashboard.php?action=back';</script>";
}
?>