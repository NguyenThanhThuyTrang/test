<?php
if(isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    if ($username === "chuoi" && $password === "1234") {
        $_SESSION["dangnhap"] = 'chuoi';
        header("Location:index.php?page=trangchu");
        exit();
    
    }elseif($username === "qlch1" && $password === "1234") {
        $_SESSION["dangnhap"] = 'qlch1';
        header("Location:index.php?page=trangchu");
        exit();
    }elseif($username === "nvbh" && $password === "1234") {
        $_SESSION["dangnhap"] = 'nvbh';
        header("Location:index.php?page=trangchu");
        exit();
    }elseif($username === "nvb" && $password === "1234") {
        $_SESSION["dangnhap"] = 'nvb';
        header("Location:index.php?page=trangchu");
        exit();
    }else {
        echo '<script>alert("Đăng nhập không thành công");</script>';
    }
}
?>
