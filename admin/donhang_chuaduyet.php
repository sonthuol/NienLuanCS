<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/admin.css">
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
            <h2>Danh sách đơn hàng chưa duyệt</h2>
            <div id="chucnang">
                <div id="hienthi">
                </div>
                <div id="timkiem">
                    <label>Tìm kiếm</label>
                    <input type="text" onkeyup="timkiem(this.value)">
                </div>
            </div>
            <?php
                include '/NienLuanCS/connection/connection.php';
                $cout_hd = 0;
                $sql_hd= "SELECT COUNT(id_hd) as count_hd FROM hoadon";
                $result_hd = $con->query($sql_hd);
                if($result_hd->num_rows > 0){
                    while($row_couthd = $result_hd->fetch_assoc()){
                        $cout_hd = $row_couthd['count_hd'];
                    } 
                }
            ?>
            <div id="danhsach">
            <p class="so_th">Tổng số hoá đơn chưa duyệt: <?php echo $cout_hd?></p>
                <table border="1">
                <tr>
                        <th rowspan="2">STT</th>
                        <th rowspan="2">Mã hoá đơn</th>
                        <th rowspan="2">Khách hàng</th>
                        <th rowspan="2">Sản phẩm</th>
                        <th rowspan="2" width='120px'>Tổng tiền</th>
                        <th rowspan="2">Ngày giờ</th>
                        <th rowspan="2" width='110px'>Trạng thái</th>
                        <th colspan="2">Hành động</th>
                    </tr>
                <tr>
                    <th>Duyệt</th>
                    <th>Xóa</th>
                </tr>
            <?php
                $sql = "SELECT * from hoadon order by id_hd DESC";
                $result = $con->query($sql);
                $i = 0;
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $thanhtien = 0;
                        //Tim thong tin khách hàng (Tên khách hàng)
                        $sql_tv = "SELECT * from thanhvien where id = '".$row['id']."'";
                        $result_thanhvien = $con->query($sql_tv);
                        $row_tv = $result_thanhvien->fetch_assoc();
                        //Sản phẩm mà khách hàng đã mua
                        $sql_ttsp = "
                                SELECT sp.ten_sp, SP_HD.sl_sp, SP_HD.dongia
                                FROM ( SELECT cthd.id_sp, cthd.sl_sp, cthd.dongia FROM chitiethoadon cthd WHERE cthd.id_hd = '".$row['id_hd']."' ) SP_HD, sanpham sp
                                WHERE SP_HD.id_sp = sp.id_sp
                        ";
                        $result_ttsp = $con->query($sql_ttsp);
                        echo "
                        <tr>
                            <td>".($i = $i + 1)."</td>
                            <td>".$row['id_hd']."</td>
                            <td>".$row_tv['hoten_tv']."</td>";
                            echo "<td width='300px'>";
                                    while($row_ttsp = $result_ttsp->fetch_assoc()){
                                        echo "
                                            ".$row_ttsp['ten_sp']." [".$row_ttsp['sl_sp']."] <br>
                                        ";
                                        $thanhtien = $thanhtien + $row_ttsp['dongia'];
                                    }
                                echo "</td>";
                        echo "
                            <td>".number_format($thanhtien, 0, '', ',')." đ</td>
                            <td>".$row['ngay_dathang']."</td>
                            <td id='".$row['id_hd']."_duyet'>Chưa duyệt</td>
                            <td><button onclick='xuly_donhang_duyet(".$row['id_hd'].");' ><i class='fas fa-check-square' id='".$row['id_hd']."_check'></i></button></td>
                            <td><a href='xoadonhang.php?id=".$row['id_hd']."'><img src='../img/delete.png' alt='' width='20px' height='20px'></a></td>
                        </tr>";
                    }
                }
            ?>
                </table>
            </div>
        </div>
    </div>
    <script>
        function timkiem(str) {
            if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            } else { // code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                    document.getElementById("danhsach").innerHTML=xmlhttp.responseText; 
                } 
            }   
            xmlhttp.open("GET", "../ajax/timkiem_nv.php?tk="+str, true);
            xmlhttp.send();
        }
    </script>
    <script>
        function xuly_donhang_duyet(id_hoadon){
            document.getElementById(id_hoadon+'_duyet').innerHTML = 'Đã duyệt';
            document.getElementById(id_hoadon+'_check').style.backgroundColor = 'black';
        }
    </script>
</body>
</html>