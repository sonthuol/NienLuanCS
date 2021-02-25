<?php
    session_start();
    include '/NienLuanCS/connection/connection.php';
    $idsp = $_GET['idsp'];
    $_SESSION['idsp'] = $idsp;
    $sql = "SELECT * from sanpham sp, loaisp lsp where sp.id_sp = '".$idsp."' and sp.ma_loaisp = lsp.ma_loaisp ";
    $sql_ds = "SELECT * from sanpham sp, ds_img ds where sp.id_sp = '".$idsp."' and sp.id_sp = ds.id_sp ";
    $con->query($sql);
    $result = $con->query($sql_ds);
    $result1 = $con->query($sql_ds);
    $row = $con->query($sql)->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['ten_sp']?></title> <link rel = "icon" href =  "img/logo/logo.png" 
    type = "image/x-icon"> 
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/tieude.css">
    <link rel="stylesheet" href="css/noidung.css">
    <link rel="stylesheet" href="css/chitietsp.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <!-- Font Awesome Icon Library -->
    <link rel="stylesheet" href="css/start.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
</head>

<body>
<?php
    include 'tieude.php';
?>
    <div id="noidung">
        <div id="chitietsanpham">
            <div class="img_main">
                <?php
                    if($row['ma_loaisp'] =='ĐT'){
                        $sql_img = "SELECT * from sanpham where ten_sp = '".$row['ten_sp']."'";
                        $result_img = $con->query($sql_img);
                        if($result_img->num_rows > 0){
                            while($row_img = $result_img->fetch_assoc()){
                                ?>
                                    <div class="img_list">
                                        <img src="./img/<?php echo $row_img['img_sp']?>" alt="" style="width:100%">  
                                    </div>
                                <?php
                            }
                        }
                    }else{
                        if($result->num_rows > 0){
                            while($row_ds = $result->fetch_assoc()){
                                ?>
                                    <div class="img_list">
                                        <img src="./img/<?php echo $row_ds['img']?>" alt="" style="width:100%">  
                                    </div>
                                <?php
                            }
                        }else{
                            ?>
                                <div class="img_list">
                                    <img src="./img/<?php echo $row['img_sp']?>" alt="" style="width:100%">  
                                </div>
                            <?php
                        }
                    }
                ?>
                <a class="prev" onclick="plusSlides(-1)">❮</a>
                <a class="next" onclick="plusSlides(1)">❯</a>
                <div class="row">
                    <?php
                        $i = 0;
                        if($row['ma_loaisp'] == 'ĐT'){
                            $sql_img = "SELECT * from sanpham where ten_sp = '".$row['ten_sp']."'";
                            $result_img = $con->query($sql_img);
                            if($result_img->num_rows > 0){
                                while($row_img = $result_img->fetch_assoc()){
                                    ++$i;
                                    ?>
                                        <div class="column">
                                            <img class="demo cursor" src="./img/<?php echo $row_img['img_sp']?>" style="width:100%" onclick="currentSlide(<?php echo $i;?>)" alt="The Woods">
                                            <p><?php echo $row_img['mausac']?></p>
                                        </div>
                                    <?php
                                }
                            }
                        }else{
                            $i = 0;
                            if($result1->num_rows > 0){
                                while($row_ds = $result1->fetch_assoc()){
                                    ++$i;
                                    ?>
                                        <div class="column">
                                            <img class="demo cursor" src="./img/<?php echo $row_ds['img']?>" style="width:100%" onclick="currentSlide(<?php echo $i;?>)" alt="The Woods">
                                            <p><?php echo $row_ds['mau']?></p>
                                        </div>
                                    <?php
                                }
                            }else{
                                echo "";
                            }
                        }
                    ?>
                </div>
            </div>
            <div class="noidungsp">
                <h2><?php echo $row['ten_sp']?></h2>
                <h3>Thông số kỉ thuật</h3>
                <?php
                    $sql_tskt = "SELECT * from thongsokithuat where id_sp = '".$idsp."'";
                    $result_tskt = $con->query($sql_tskt);
                    if($result_tskt->num_rows > 0){
                        while($row_tskt = $result_tskt->fetch_assoc()){
                            if($row_tskt['ma_loaisp'] == 'ĐT'){
                                //Thonh tin ki thuat so Điện thoại
                                ?>
                                    <table>
                                        <tr>
                                            <td>Màn hình:</td>
                                            <td><?php echo $row_tskt['manhinh'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Hệ điều hành:</td>
                                            <td><?php echo $row_tskt['hedieuhanh'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Camera sau:</td>
                                            <td><?php echo $row_tskt['camera_sau'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Camera trước:</td>
                                            <td><?php echo $row_tskt['camera_truoc'];?></td>
                                        </tr>
                                        <tr>
                                            <td>CPU:</td>
                                            <td><?php echo $row_tskt['cpu'];?></td>
                                        </tr>
                                        <tr>
                                            <td>RAM:</td>
                                            <td><?php echo $row_tskt['ram'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Bộ nhớ trong:</td>
                                            <td><?php echo $row_tskt['bonhotrong'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Sim:</td>
                                            <td><?php echo $row_tskt['sim'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Dung lượng pin:</td>
                                            <td><?php echo $row_tskt['dungluongpin'];?></td>
                                        </tr>
                                    </table>
                                <?php
                            }else if($row_tskt['ma_loaisp'] == 'ĐHTM'){
                                //Thonh tin ki thuat so Đồng hồ thông minh
                                ?>
                                    <table>
                                        <tr>
                                            <td>Công nghệ màn hình: </td>
                                            <td><?php echo $row_tskt['congnghemanhinh'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Kích thước màn hình: </td>
                                            <td><?php echo $row_tskt['kichthuocmanhinh'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Thời gian sử dung pin: </td>
                                            <td><?php echo $row_tskt['thoigiansudungpin'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Hệ điều hành:</td>
                                            <td><?php echo $row_tskt['hedieuhanh'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Kết nối với hệ diều hành:</td>
                                            <td><?php echo $row_tskt['ketnoivoihedieuhanh'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Chất liệu mặt:</td>
                                            <td><?php echo $row_tskt['chatlieumat'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Đường kính mặt:</td>
                                            <td><?php echo $row_tskt['duongkinhmat'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Kết nối:</td>
                                            <td><?php echo $row_tskt['ketnoi'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Ngôn ngữ: </td>
                                            <td><?php echo $row_tskt['ngonngu'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Theo dõi sức khỏe: </td>
                                            <td width="300px"><?php echo $row_tskt['theodoisuckhoe'];?></td>
                                        </tr>
                                    </table>
                                <?php

                            }else if($row_tskt['ma_loaisp'] == 'LT'){
                                //Thonh tin ki thuat so Laptop
                                ?>
                                    <table>
                                        <tr>
                                            <td>CPU: </td>
                                            <td><?php echo $row_tskt['cpu'];?></td>
                                        </tr>
                                        <tr>
                                            <td>RAM: </td>
                                            <td><?php echo $row_tskt['ram'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Ổ cứng: </td>
                                            <td><?php echo $row_tskt['o_cung'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Màn hình:</td>
                                            <td><?php echo $row_tskt['manhinh'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Card màn hình:</td>
                                            <td><?php echo $row_tskt['card_manhinh'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Cổng kết nối:</td>
                                            <td><?php echo $row_tskt['congketnoi'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Hệ điều hành:</td>
                                            <td><?php echo $row_tskt['hedieuhanh'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Thiết kế:</td>
                                            <td><?php echo $row_tskt['thietke'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Kích thước: </td>
                                            <td><?php echo $row_tskt['kichthuoc'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Thời điểm ra mắt: </td>
                                            <td><?php echo $row_tskt['thoidiemramat'];?></td>
                                        </tr>
                                    </table>
                                <?php
                            }else if($row_tskt['ma_loaisp'] == 'MTB'){
                                //Thonh tin ki thuat so máy tính bảng
                                ?>
                                    <table>
                                        <tr>
                                            <td>Màn hình:</td>
                                            <td><?php echo $row_tskt['manhinh'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Hệ điều hành: </td>
                                            <td><?php echo $row_tskt['hedieuhanh'];?></td>
                                        </tr>
                                        <tr>
                                            <td>CPU: </td>
                                            <td><?php echo $row_tskt['cpu'];?></td>
                                        </tr>
                                        <tr>
                                            <td>RAM:</td>
                                            <td><?php echo $row_tskt['ram'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Bộ nhớ trong:</td>
                                            <td><?php echo $row_tskt['bonhotrong'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Camera sau:</td>
                                            <td><?php echo $row_tskt['camera_sau'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Camera trước:</td>
                                            <td><?php echo $row_tskt['camera trước'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Kết nối mạng:</td>
                                            <td><?php echo $row_tskt['ketnoimang'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Hộ trợ sim: </td>
                                            <td><?php echo $row_tskt['hotrosim'];?></td>
                                        </tr>
                                    </table>
                                <?php
                            }else{

                            }
                        }
                    }else{
                        echo "";
                    }
                ?>
                <div class="giasp">
                    <h3>Giá:</h3>
                    <h2><?php 
                    $gia_fm = number_format($row['gia_ban'], 0, '', ',');
                    echo $gia_fm?><u>đ</u>
                    </h2>
                    <span>-5%</span> 
                </div>
                <?php
                    if($row['ma_loaisp'] === 'ĐT'){
                        ?>
                            <div class="mausac">
                                <?php
                                    
                                ?>
                            </div>
                        <?php
                    }else{
                        echo "gege";
                    }
                ?>
                <form action="xuly_giohang.php" method="POST" enctype="multipart/form-data">
                <div class="mua_giohang">
                    <input type="submit" onclick="ktsession()" value="Mua Ngay"></input>
                    <input type="submit" onclick="ktsession()" value="Thêm vào giỏ hàng"></input>
                </div>
                </form>
            </div>
        </div>
        <div class="xemdanhgiasanpham">
            <div class="sodanhgia_timdanhgia">
                <div class="sodanhgia">
                    <h3 class="sodanhgia">1048 đánh giá cho sản phẩm</h3>
                </div>
                <div class="timdanhgia">
                    <i class="fa fa-search"></i>
                    <input type="text" name="timnoidungdanhgia" placeholder="Tìm nội dung dánh giá">
                </div>
            </div>
            <div class="tonghopdanhgia">
                <div class="phantramsao">
                    <p>6.5<i class="fas fa-star"></i></p>
                </div>
                <div class="chitietsao">
                    <div class="sosao_thongke_sodanhgia">
                        <div class="sosao">
                            <p>5<i class="fas fa-star"></i></p>
                        </div>
                        <div class="thongke">
                        </div>
                        <div class="sodanhgia">
                            <a href="">255 đánh giá</a>
                        </div>
                    </div>
                    <div class="sosao_thongke_sodanhgia">
                        <div class="sosao">
                            <p>4<i class="fas fa-star"></i></p>
                        </div>
                        <div class="thongke">
                        </div>
                        <div class="sodanhgia">
                            <a href="">255 đánh giá</a>
                        </div>
                    </div>
                    <div class="sosao_thongke_sodanhgia">
                        <div class="sosao">
                            <p>3<i class="fas fa-star"></i></p>
                        </div>
                        <div class="thongke">
                        </div>
                        <div class="sodanhgia">
                            <a href="">255 đánh giá</a>
                        </div>
                    </div>
                    <div class="sosao_thongke_sodanhgia">
                        <div class="sosao">
                            <p>2<i class="fas fa-star"></i></p>
                        </div>
                        <div class="thongke">
                        </div>
                        <div class="sodanhgia">
                            <a href="">255 đánh giá</a>
                        </div>
                    </div>
                    <div class="sosao_thongke_sodanhgia">
                        <div class="sosao">
                            <p>1<i class="fas fa-star"></i></p>
                        </div>
                        <div class="thongke">
                        </div>
                        <div class="sodanhgia">
                            <a href="">255 đánh giá</a>
                        </div>
                    </div>
                </div>
                <div class="bnt_danhgia">
                    <button>Gủi đánh giá của bạn</button>
                </div>
            </div>
            <div class="khachhang_danhgia">
                <form action="">
                    <div class="danhgiasao">
                        <h4>Chọn đánh giá của bạn</h4>
                        <div class="start">
                                <input class="star star-5" id="star-5" type="radio" name="star" value="5" />
                                <label class="star star-5" for="star-5"></label>
                                <input class="star star-4" id="star-4" type="radio" name="star" value="4" />
                                <label class="star star-4" for="star-4"></label>
                                <input class="star star-3" id="star-3" type="radio" name="star" value="3" />
                                <label class="star star-3" for="star-3"></label>
                                <input class="star star-2" id="star-2" type="radio" name="star" value="2" />
                                <label class="star star-2" for="star-2"></label>
                                <input class="star star-1" id="star-1" type="radio" name="star" value="1" />
                                <label class="star star-1" for="star-1"></label>
                        </div>
                    </div>
                    <div class="danhgia_all">
                        <div class="comment_and_anh">
                            <textarea name="noidungcmt" id="" cols="70" rows="5"></textarea>
                        </div>
                        <div class="tt_khach_comment">

                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
            $loaisp = "SELECT * from sanpham sp, loaisp lsp 
                        where sp.ma_loaisp = '".$row['ma_loaisp']."' and sp.ma_loaisp = lsp.ma_loaisp
                        order by sp.id_sp DESC limit 0, 10            ";
            $result_lsp = $con->query($loaisp);
            if($result_lsp->num_rows > 0){
                echo "<div id='dienthoai'>
                            <div class='tieude'>
                                <h2><i class='fas fa-angle-double-right'></i>".$row['ten_loaisp']."</h2>
                                <a href='noidung_loaisp.php?lsp=".$row['ma_loaisp']."'>Xem tất cả <i class='fas fa-angle-double-right'></i></a>
                            </div>
                            <div class='danhsachsanpham'>";
                while($row1 = $result_lsp->fetch_assoc()){
                        $gia_goc = number_format($row1['gia_ban'], 0, '', ',');
                        $gia_giam = number_format($row1['gia_ban']-($row1['gia_ban']*0.05), 0, '', ',');
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
                                echo "<p class='khong'></p>";
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
                echo "Không có sản phẩm";
            }
        ?>
    </div>
    <?php
        include 'footer.php';
    ?>
    <script src="js/ktsesstion.js"></script>
    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("img_list");
            var dots = document.getElementsByClassName("demo");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
        }
    </script>
</body>

</html>