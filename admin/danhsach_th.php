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
        session_start();
        include 'tieude.php';
    ?>
    <div id="content">
        <?php
            include 'menu_trai.php';
        ?>
       
        <div id="noidungchinh">
            <h2>Danh sách thương hiệu sản phẩm</h2>
            <div id="chucnang">
                <div id="upload">
                    <form method="POST" action="./upload_excel/upload_excel_th.php" enctype="multipart/form-data">
                            <input type="file" name="uploadFile" class="form-control" />
                            <button type="submit" name="submit" class="btn btn-success">Upload</button>
	                </form>
                </div>
                <div id="timkiem">
                    <label>Tìm kiếm</label>
                    <input type="text" onkeyup="timkiem(this.value)">
                </div>
            </div>
            <?php
                include '/NienLuanCS/connection/connection.php';
                $cout_th = 0;
                $sql_th = "SELECT COUNT(id_th) as count_th FROM `thuonghieu` WHERE 1";
                $result_th = $con->query($sql_th);
                if($result_th->num_rows > 0){
                    while($row_coutth = $result_th->fetch_assoc()){
                        $cout_th = $row_coutth['count_th'];
                    } 
                }
            ?>
            <div id="danhsach">
            <p class="so_th">Tổng số thương hiệu: <?php echo $cout_th?></p>
                <table border="1">
                <tr>
                        <th rowspan="2">ID_TH</th>
                        <th rowspan="2">Loại SP</th>
                        <th rowspan="2">Mã hiệu</th>
                        <th rowspan="2">Tên thương hiệu</th>
                        <th rowspan="2">Logo</th>
                        <th colspan="2">Cập nhật</th>
                    </tr>
                <tr>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            <?php
               include '/NienLuanCS/connection/connection.php';
               $sql = "SELECT * from thuonghieu order by id_th";
               $result = $con->query($sql);
               $i = 0;
               if($result->num_rows > 0){
                   while($row = $result->fetch_assoc()){
                   echo "
                       <tr> 
                           <td>".$row['id_th']."</td>
                           <td>".$row['ma_loaisp']."</td>
                           <td>".$row['ma_th']."</td>
                           <td>".$row['ten_tenth']."</td>
                           <td><img src='../img/".$row['img_th']."' alt='' width=160px height=30px></td>
                           <td><a href='sua_th.php?id=".$row['id_th']."'><img src='../img/edit.png' alt=''></a></td>
                           <td><a href='xoa_th.php?id=".$row['id_th']."'><img src='../img/delete.png' alt=''></a></td>
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
            xmlhttp.open("GET", "../ajax/timkiem_th.php?tk="+str, true);
            xmlhttp.send();
        }
    </script>
</body>
</html>