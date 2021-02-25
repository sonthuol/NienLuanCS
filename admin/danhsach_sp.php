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
            include 'menu_trai.php'
        ?>
        <div id="noidungchinh">
            <h2>Danh sách sản phẩm</h2>
            <div id="chucnang">
                <div id="upload">
                    <form method="POST" action="./upload_excel/upload_excel_sp.php" enctype="multipart/form-data">
                            <input type="file" name="uploadFile" class="form-control" />
                            <button type="submit" name="submit" class="btn btn-success">Upload</button>
	                </form>
                </div>
                <div id="timkiem">
                    <label>Tìm kiếm</label>
                    <input type="text" onkeyup="timkiem(this.value)">
                </div>
            </div>
            <div id="danhsach">
                <table border="1">
                    <tr>
                        <th rowspan="2">STT</th>
                        <th rowspan="2">id_sp</th>
                        <th rowspan="2">Tên sản phẩm</th>
                        <th rowspan="2">Ảnh sản phẩm</th>
                        <th rowspan="2">Màu sắc</th>
                        <th rowspan="2">Giá</th>
                        <th rowspan="2">SL</th>
                        <th rowspan="2">Khuyến mãi</th>
                        <th rowspan="2">Giá trị khuyến mãi</th>
                        <th colspan="2">Cập nhật</th>
                        <th rowspan="2">+</th>

                    </tr>
                    <tr>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
            <?php
                include '/NienLuanCS/connection/connection.php';
                $sql = "SELECT * from sanpham";
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
                            <td>".number_format($row['giatrikhuyenmai'], 0, '', ',')."</td>
                            <td><a href='./sua_sp.php?id=".$row['id_sp']."'><img src='../img/edit.png' alt=''></a></td>
                            <td><a href='./xoa_sp.php?id=".$row['id_sp']."'><img src='../img/delete.png' alt=''></a></td>
                            <td><a href='./chitietsp.php?idsp=".$row['id_sp']."'><img class='xemchitiet' src='../img/xemthem.jpg' alt=''></a></td>
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
            xmlhttp.open("GET", "../ajax/timkiem_sp.php?tk="+str, true);
            xmlhttp.send();
        }
    </script>
</body>
</html>