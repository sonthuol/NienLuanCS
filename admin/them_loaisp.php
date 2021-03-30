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
        <h2>Thêm loại sản phẩm</h2>
            <div id="themloaisp">
                <form action="xuly_themloaisp.php" method="POST" >
                    <table>
                        <tr>
                            <td>Mã loại SP: </td>
                            <td><input type="text" name="ma_loai" placeholder="Mã loại sản phẩm"></td>
                        </tr>
                        <tr>
                            <td>Tên loại SP: </td>
                            <td><input type="text" name="ten_loai" placeholder="Tên loại sản phẩm"></td>
                        </tr>
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
            <?php
                include '/NienLuanCS/connection/connection.php';
                $sql = "SELECT * from loaisp";
                $result = $con->query($sql);
            ?>  
            <h2>Danh sách loại sản phẩm</h2>
                <table border="1">
                    <tr>
                        <th rowspan="2">STT</th>
                        <th rowspan="2">Mã Loại</th>
                        <th rowspan="2">Tên Loại</th>
                        <th colspan="2">Cập nhật</th>
                    </tr>
                    <tr>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>

            <?php
                $i = 0;
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){ 
                    echo "
                        <tr>
                            <td>".($i = $i + 1)."</td>
                            <td>".$row['ma_loaisp']."</td>
                            <td>".$row['ten_loaisp']."</td>
                            <td><a href='sua_loaisp.php?id=".$row['ma_loaisp']."'><img src='../img/edit.png' alt=''></a></td>
                            <td><a href='xoa_loaisp.php?id=".$row['ma_loaisp']."'><img src='../img/delete.png' alt=''></a></td>
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