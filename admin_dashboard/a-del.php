<?php
require '../config.php';
$id = $_GET['id'];

if (hapus_user($id) > 0){
    echo "<script>alert('user berhasil dihapus!');document.location='a_man.php?action=back';</script>";
}else{
    echo "<script>alert('user gagal dihapus!');document.location='a_man.php?action=back';</script>";
}
?>
