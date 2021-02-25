<!DOCTYPE html>
<html lang="en">

<?php   
        session_start();
        include 'connection/connection.php';
        $ma_loaiSP = $_GET['lsp'];
        unset($_SESSION['ma_th']);
        unset($_SESSION['gia']);
        unset($_SESSION['khuyenmai']);
        unset($_SESSION['sosao']);
        unset($_SESSION['sapxep']);
        $sql = "SELECT * from loaisp where ma_loaisp = '".$ma_loaiSP."'";
        $con->query($sql);
        $row = $con->query($sql)->fetch_assoc();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['ten_loaisp']?></title>
    <link rel = "icon" href =  
    "img/logo/logo.png" 
    type = "image/x-icon"> 
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/tieude.css">
    <link rel="stylesheet" href="css/banner_loaisp.css">
    <link rel="stylesheet" href="css/boloc.css">
    <link rel="stylesheet" href="css/thuonghieu.css">
    <link rel="stylesheet" href="css/noidung.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>

<body>
    <?php
        include 'tieude.php';
    ?>
    <?php
        include 'slider_loaisp.php';
    ?>
    <?php
        include 'boloc.php';
    ?>
        <?php
        include 'thuonghieu.php';
    ?>
    <div id="noidung">
    <?php
        $loaisp = "SELECT * from sanpham sp, loaisp lsp 
                    where sp.ma_loaisp = '".$ma_loaiSP."' and sp.ma_loaisp = lsp.ma_loaisp
                    GROUP by sp.ten_sp
                    order by sp.id_sp;
        ";
        $result_lsp = $con->query($loaisp);
        $row = $result_lsp->fetch_assoc();
        if($result_lsp->num_rows > 0){
            echo "<div id='dienthoai'>
                        <div class='tieude'>
                            <h2><i class='fas fa-angle-double-right'></i>".$row['ten_loaisp']."</h2>
                            <a href='noidung_loaisp.php?lsp=".$row['ma_loaisp']."'>Xem tất cả <i class='fas fa-angle-double-right'></i></a>
                        </div>
                        <div class='danhsachsanpham'>";
            while($row1 = $result_lsp->fetch_assoc()){
                    $gia_goc = number_format($row1['gia_sp'], 0, '', ',');
                    $gia_giam = number_format($row1['gia_sp']-($row1['gia_sp']*0.05), 0, '', ',');
                    echo "
                        <div class='sanpham'>
                            <a href='chitietsanpham.php?idsp=".$row1['id_sp']."'>";
                        if($row1['khuyenmai'] == "Trả góp"){
                            echo "<p class='tragop'>Trả góp ".$row1['giatrikhuyenmai']."</p>";
                        }else if($row1['khuyenmai'] == "Giảm giá"){
                            echo "<p class='gg'>Giảm: -".number_format($row1['giatrikhuyenmai'], 0, '', ',')."</p>";
                        }else if($row1['khuyenmai'] == "Mới ra mắt"){
                            echo "<p class='moi'>Mới ra mắt</p>";
                        }else{
                            echo "<p class='khong'>Không khuyến mãi gì hết</p>";
                        }
                    echo "
                                <img src='./img/".$row1['img_sp']."' alt=''>
                                <div class='ttsp'>
                                    <p class='tensp'>".$row1['ten_sp']."</p>
                                    <div class='giamgia_phantram'>
                                        <p class='giamgia'>".$gia_giam."<u>đ</u></p>
                                        <p class='phantramgiam'>-5%</p>
                                    </div>
                                    <p class='giagoc'>".$gia_goc."<u>đ</u></p>
                                    <div class='start'>
                        ";
                            for($i = 1; $i <= $row1['sosao']; ++ $i){
                                echo "<i class='fas fa-star'></i>";
                            }
                    echo"
                                        <p class='danhgia'>".$row1['danhgia']." đánh giá</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    ";
                }
            echo "  </div>
            </div>
            ";
        }else{
            echo "<h1>Hệ Thống Chưa Cập Nhật</h1>";
        }
    ?>
    </div>
<?php
    include 'footer.php';
?>
    <script src="js/timkiemsp.js"></script>
</body>

</html>