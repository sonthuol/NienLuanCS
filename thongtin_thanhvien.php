<!DOCTYPE html>
<html lang="en">
<?php
        session_start();
        if(isset($_SESSION['user'])){
            include '/NienLuanCS/connection/connection.php';
            $sql = "SELECT * from thanhvien where tentaikhoan = '".$_SESSION['user']."'";
            $result = $con->query($sql);
            $row = $result->fetch_assoc();
        }else{
            header("Location: index.php");
        }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['hoten_tv']?></title>
    <link rel = "icon" href =  
    "img/logo/logo.png" 
    type = "image/x-icon"> 
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/tieude.css">
    <link rel="stylesheet" href="css/noidung.css">
    <link rel="stylesheet" href="css/tt_thanhvien.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>
<body>
    <?php
        include 'tieude.php';
    ?>
    <div id="introduction">
        <div id="bg">
            <h1>Hello <?php echo $row['tentaikhoan']?></h1>
        </div>
        <div id="content">
            <div id="story">
                <h2>Lời chúc khách hàng</h2>
                <p>Chúng tôi thực sự biết ơn vì bạn đã ghi nhớ, ưu tiên sử dụng các sản phẩm, 
                    dịch vụ của chúng tôi khi có nhu cầu. Chúng tôi không thể có sự thành công như hôm nay nếu không có bạn.
                    Chúc mừng tháng mới thịnh vượng,
                    những người khách hàng thân thiết của chúng tôi!
                </p>
            </div>
            <div id="image">
                <?php
                    echo "<img src='img/".$row['path_anh_tv']."' alt=''>";
                ?>
            </div>
            <div id="infor_main">
                <h2>Thông tin khách hàng</h2>
                <table>
                    <tr>
                        <td>Tên tài khoản: </td>
                        <td>
                            <?php
                                echo $row['tentaikhoan'];
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Họ và tên: </td>
                        <td>
                            <?php
                                echo $row['hoten_tv'];
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Số điện thoại: </td>
                        <td>
                            <?php
                                echo $row['sdt'];
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Email: </td>
                        <td>
                            <?php
                                echo $row['email'];
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Địa chỉ: </td>
                        <td>
                            <?php
                                echo $row['diachi'];
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <?php
        include 'footer.php';
    ?>
    <script src="js/timkiemsp.js"></script>
</body>
</html>