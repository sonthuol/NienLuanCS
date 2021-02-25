<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký thành viên</title>
    <link rel = "icon" href =  
    "img/logo/logo.png" 
    type = "image/x-icon"> 
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/tieude.css">
    <link rel="stylesheet" href="css/noidung.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/dangky.css">
    <link rel="stylesheet" href="css/giohang.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>

<body>
    <?php
        session_start();
        include 'tieude.php';
    ?>
<div class="dangky">
    <form action="xuly_form_dangky.php" method="POST" enctype="multipart/form-data">
        <h2>Đăng ký tài khoản</h2>
        <p>Họ và tên:</p>
        <input type="text" name="hoten" id="hoten" placeholder="Nhập họ và tên ...">
        <p>Tên tài khoản:</p>
        <input type="text" name="tentaikhoan" id="tentaikhoan" placeholder="Nhập tên tài khoản ...">
        <p>Mật khẩu:</p>
        <input type="password" name="matkhau" id="matkhau" placeholder="Nhập mật khẩu ...">
        <p>Nhập lại mật khẩu:</p>
        <input type="password" name="nhaplai_matkhau" id="nhaplai_matkhau" placeholder="Nhập lại mật khẩu ...">
        <p>Nhập địa chỉ email:</p>
        <input type="text" name="email" id="email" placeholder="Nhập emali ...">
        <p>Nhập số điện thoại:</p>
        <input type="text" name="sdt" id="sdt" placeholder="Nhập số điện thoại ...">
        <p>Ảnh đại diện:</p>
        <input type="file" name="anhdaidien" id="anhdaidien">
        <input type="submit" name="" value="Đăng ký"><br>
        <div id="dangkytk">
            <span><a href="form_doimatkhau.php">Quên mật khẩu?</a></span><br>
            <span><a href="form_dangky.php">Chưa có tài khoản?</a></span>
        </div>
    </form>
</div>
<?php
    include 'footer.php';
?>
<script src="js/timkiemsp.js"></script>
</body>
</html>