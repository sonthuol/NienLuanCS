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
        <h2>Danh sách hình ảnh của từng sản phẩm</h2>
            <div id="chucnang">
                <div id="upload">
                    <form method="POST" action="./upload_excel/upload_excel_dshinhanh.php" enctype="multipart/form-data">
                            <input type="file" name="uploadFile" class="form-control" />
                            <button type="submit" name="submit" class="btn btn-success">Upload</button>
	                </form>
                </div>
            </div>
            <div id="danhsach">
                <table border="1">
                    <tr>
                        <th rowspan="2">ID_SP</th>
                        <th rowspan="2">Ảnh sản phẩm</th>
                        <th rowspan="2">Màu</th>
                        <th colspan="3">Cập nhật</th>
                    </tr>
                    <tr>
                        <th>Sửa</th>
                        <th>Xóa</th>
                        <th>Xem chi tiết</th>
                    </tr>
            <?php
                include '/NienLuanCS/connection/connection.php';
                $sql = "SELECT * from ds_img";
                $result = $con->query($sql);
                $i = 0;
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                    echo "
                        <tr>
                            <td>".$row['id_sp']."</td>
                            <td><img src='../img/".$row['img']."' alt='' width=100px height=100px></td>
                            <td>".$row['mau']."</td>
                            <td><a href='./sua_sp.php?id=".$row['id_sp']."'><img src='../img/edit.png' alt=''></a></td>
                            <td><a href='./xoa_sp.php?id=".$row['id_sp']."'><img src='../img/delete.png' alt=''></a></td>
                            <td><a href='./chitietsp.php?id=".$row['id_sp']."'>+</a></td>
                        </tr>";
                    }
                }
            ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>