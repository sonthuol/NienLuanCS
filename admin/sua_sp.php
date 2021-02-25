<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/them_lsp_th_sp.css">
    <link rel="stylesheet" href="../css/danhsach_lsp_th_sp.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>
<body>
    <?php
        include 'tieude.php';
    ?>
    <div id="content">
        <?php
            include 'menu_trai.php';
        ?>
        <div id="noidungchinh">
        <h2>Chỉnh sửa sản phẩm</h2>
            <div id="themloaisp">
                <form action="xuly_sua_sp.php" method="POST" enctype="multipart/form-data">
                <?php
                    session_start();
                    $idsp = $_GET['id'];
                    $_SESSION['idsp'] = $idsp;
                    include '/NienLuanCS/connection/connection.php';
                    $sql = "SELECT * from sanpham sp, thuonghieu th, loaisp lsp 
                            WHERE sp.id_sp = ".$idsp."
                            and sp.id_th = th.id_th and sp.ma_loaisp = lsp.ma_loaisp";
                    $result = $con->query($sql);
                    $row  = $result->fetch_assoc();
                    $_SESSION['img_sp'] = $row['img_sp'];
                    $_SESSION['ngay_tao'] = $row['ngay_tao'];
                ?>
                    <table>
                        <tr>
                            <td>Tên loại sản phẩm: </td>
                            <td>
                                <select name="maloaisp" onclick="thuonghieu(this.value)">
                                <?php echo " <option value='".$row['ma_loaisp']."'>".$row['ten_loaisp']."</option>"; ?>
                                    <?php
                                        $sql1 = "SELECT * from loaisp";
                                        $result1 = $con->query($sql1);
                                        if($result1->num_rows > 0){
                                            while($row1 = $result1->fetch_assoc()){
                                                echo " <option value='".$row1['ma_loaisp']."'>".$row1['ten_loaisp']."</option>";
                                            }
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Tên thương hiệu: </td>
                            <td>
                                <select name="idth" id="showthuonghieu">
                                   <?php echo " <option value='".$row['id_th']."'>".$row['ten_tenth']."</option>"; ?>
                                    <?php
                                        $sql2 = "SELECT * from thuonghieu where ma_loaisp = 'LT'";
                                        $result2 = $con->query($sql2);
                                        if($result2->num_rows > 0){
                                            while($row2 = $result2->fetch_assoc()){
                                                echo " <option value='".$row2['id_th']."'>".$row2['ten_tenth']."</option>";
                                            }
                                        }
                                    ?>
                                </select>
                            </td>                    
                        </tr>
                        <tr>
                            <td>Tên sản phẩm: </td>
                            <td><input type="text" name="tensp" placeholder="Tên sản phẩm" value="<?php echo $row['ten_sp']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Giá sản phẩm: </td>
                            <td><input type="text" name="gia_sp" placeholder="Giá sản phẩm" onkeyup="giasp(this.value)" value="<?php echo $row['gia_sp']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Định dạng giá: </td>
                            <td><p id="gia"><?php echo number_format($row['gia_sp'], 0, '', ','); ?></p></td>
                        </tr>
                        <tr>
                            <td>Hình ảnh SP:</td>
                            <td><input type="file" name="logo" placeholder="Logo"></td>
                        </tr>
                        <tr>
                            <td>Số lượng:</td>
                            <td><input type="text" name="sl" placeholder="Nhập số lượng" value="<?php echo $row['sl_sp']; ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" value="Sửa">
                                <input type="reset" value="Reset">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <hr>
            <div id="danhsach">
            <h2>Danh sách loại sản phẩm</h2>
                <table border="1">
                    <tr>
                        <th rowspan="2">STT</th>
                        <th rowspan="2">Tên sản phẩm</th>
                        <th rowspan="2">Ảnh sản phẩm</th>
                        <th rowspan="2">Giá</th>
                        <th rowspan="2">Số Lượng</th>
                        <th colspan="2">Cập nhật</th>
                    </tr>
                    <tr>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
            <?php
                $sql = "SELECT * from sanpham where id_sp = '".$idsp."'";
                $result = $con->query($sql);
                $i = 0;
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                    echo "
                        <tr>
                            <td>".($i = $i + 1)."</td>
                            <td>".$row['ten_sp']."</td>
                            <td><img src='../img/".$row['img_sp']."' alt='' width=50px height=50px></td>
                            <td>".number_format($row['gia_sp'], 0, '', ',')." Đ</td>
                            <td>".$row['sl_sp']."</td>
                            <td><a href='sua_sp.php?id=".$row['id_sp']."'><img src='../img/edit.png' alt=''></a></td>
                            <td><a href='xoa_sp.php?id=".$row['id_sp']."'><img src='../img/delete.png' alt=''></a></td>
                        </tr>";
                    }
                }
            ?>
                </table>
            </div>
        </div>
    </div>

    <script>
        function thuonghieu(str) {
            if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            } else { // code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                    document.getElementById("showthuonghieu").innerHTML=xmlhttp.responseText; 
                } 
            }   
            xmlhttp.open("GET", "/ajax/showthuonghieu.php?id="+str, true);
            xmlhttp.send();
        }

        function giasp(str) {
            if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            } else { // code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                    document.getElementById("gia").innerHTML=xmlhttp.responseText; 
                } 
            }   
            xmlhttp.open("GET", "/ajax/fomatGia.php?gia=" + str, true);
            xmlhttp.send();
        }
    </script>
</body>
</html>