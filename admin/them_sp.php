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
        session_start();
        include 'tieude.php';
    ?>
    <div id="content">
        <?php
            include 'menu_trai.php';
        ?>
        <div id="noidungchinh">
        <h2>Thêm sản phẩm</h2>
            <div id="themloaisp">
                <form action="xuly_them_sp.php" method="POST" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td>Tên loại sản phẩm: </td>
                            <td>
                                <select name="maloaisp" onchange="thuonghieu(this.value);">
                                    <?php
                                        include '/NienLuanCS/connection/connection.php';
                                        $sql = "SELECT * from loaisp";
                                        $result = $con->query($sql);
                                        if($result->num_rows > 0){
                                            while($row = $result->fetch_assoc()){
                                                echo " <option value='".$row['ma_loaisp']."'>".$row['ten_loaisp']."</option>";
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
                                    <?php
                                        $sql = "SELECT * from thuonghieu where ma_loaisp = 'LT'";
                                        $result = $con->query($sql);
                                        if($result->num_rows > 0){
                                            while($row = $result->fetch_assoc()){
                                                echo " <option value='".$row['id_th']."'>".$row['ten_tenth']."</option>";
                                            }
                                        }
                                    ?>
                                </select>
                            </td>                    
                        </tr>
                        <tr>
                            <td>Tên sản phẩm: </td>
                            <td><input type="text" name="tensp" placeholder="Tên thương hiệu"></td>
                        </tr>
                        <tr>
                            <td>Giá sản phẩm: </td>
                            <td><input type="text" name="gia_sp" placeholder="Giá sản phẩm" onkeyup="giasp(this.value)"></td>
                        </tr>
                        <tr>
                            <td>Định dạng giá: </td>
                            <td><p id="gia">0 VND</p></td>
                        </tr>
                        <tr>
                            <td>Giá bán: </td>
                            <td><input type="text" name="gia_ban" placeholder="Giá bán" onkeyup="giasp_ban(this.value)"></td>
                        </tr>
                        <tr>
                            <td>Định dạng giá bán: </td>
                            <td><p id="gia_ban">0 VND</p></td>
                        </tr>
                        <tr>
                            <td>Hình ảnh SP:</td>
                            <td><input type="file" name="logo" placeholder="Logo"></td>
                        </tr>
                        <tr>
                            <td>Số lượng:</td>
                            <td><input type="text" name="sl" placeholder="Nhập số lượng"></td>
                        </tr>
                        <tr>
                            <td>Màu sắc:</td>
                            <td><input type="text" name="mausac" placeholder=""></td>
                        </tr>
                        <tr>
                            <td>Số sao:</td>
                            <td>
                                <select name="sosao" id="sosao">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Số đánh giá:</td>
                            <td><input type="text" name="danhgia" placeholder=""></td>
                        </tr>
                        <tr>
                            <td>Khuyến mãi:</td>
                            <td>
                                <select name="khuyenmai" id="khuyenmai">
                                    <option value="Không">Không</option>
                                    <option value="Trả góp">Trả góp</option>
                                    <option value="Giảm giá">Giảm giá</option>
                                    <option value="Mới ra mắt">Mới ra măt</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Giá trị khuyến mãi</td>
                            <td><input type="text" name="giatrikhuyenmai" placeholder=""></td>
                        </tr>
                        <tr>
                            <td>Ngày bắt đầu KM:</td>
                            <td><input type="date" name="ngaybatdaukhuyenmai"></td>
                        </tr>
                        <tr>
                            <td>Ngày kết thúc KM:</td>
                            <td><input type="date" name="ngayketthuckhuyenmai"></td>
                        </tr>
                        <div id="showthongtinkithuat">

                        </div>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" value="Thêm">
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
                    <th rowspan="2">id_sp</th>
                    <th rowspan="2" >Tên sản phẩm</th>
                    <th rowspan="2">Ảnh sản phẩm</th>
                    <th rowspan="2">Màu sắc</th>
                    <th rowspan="2">Giá</th>
                    <th rowspan="2">SL</th>
                    <th rowspan="2">Khuyến mãi</th>
                    <th rowspan="2">Giá trị khuyến mãi</th>
                    <th colspan="2">Cập nhật</th>

                </tr>
                <tr>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            <?php
                $sql = "SELECT * FROM sanpham  ORDER BY id_sp DESC  LIMIT 1";
                $result = $con->query($sql);
                $i = 0;
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo "
                        <tr>
                            <td>".($i = $i + 1)."</td>
                            <td>".$row['id_sp']."</td>
                            <td>".$row['ten_sp']."</td>
                            <td><img src='../img/".$row['img_sp']."' alt='' width=100px height=100px></td>
                            <td>".$row['mausac']."</td>
                            <td>".number_format($row['gia_sp'], 0, '', ',')."</td>
                            <td>".$row['sl_sp']."</td>
                            <td>".$row['khuyenmai']."</td>
                            <td>".number_format($row['giatrikhuyenmai'], 0, '', ',')."</td>";

                        echo "
                            <td><a href='./sua_sp.php?id=".$row['id_sp']."'><img src='../img/edit.png' alt=''></a></td>
                            <td><a href='./xoa_sp.php?id=".$row['id_sp']."'><img src='../img/delete.png' alt=''></a></td>";
                        echo "
                            </tr>
                        ";
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
            xmlhttp.open("GET", "../ajax/showthuonghieu.php?id="+str, true);
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
            xmlhttp.open("GET", "../ajax/fomatGia.php?gia=" + str, true);
            xmlhttp.send();
        }
        function giasp_ban(str) {
            if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            } else { // code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                    document.getElementById("gia_ban").innerHTML=xmlhttp.responseText; 
                } 
            }   
            xmlhttp.open("GET", "../ajax/fomatGia.php?gia=" + str, true);
            xmlhttp.send();
        }
    </script>
</body>
</html>