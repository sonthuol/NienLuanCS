<?php
    include '/NienLuanCS/connection/connection.php';
    $tk = $_GET['tk'];
    if($tk == ""){
        $sql = "SELECT * from loaisp";
    }else{
        $sql = "SELECT * from loaisp where (ma_loaisp LIKE '%".$tk."%') or (ten_loaisp LIKE '%".$tk."%')";
    }
    $result = $con->query($sql);
?>
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
                <td><a href='../admin/capnhat/sua_loaisp.php?id=".$row['ma_loaisp']."'><img src='../img/edit.png' alt=''></a></td>
                <td><a href='../admin/capnhat/xoa_loaisp.php?id=".$row['ma_loaisp']."'><img src='../img/delete.png' alt=''></a></td>
            </tr>";
        }
    }else{
        echo "
        <tr>
        <th colspan='5'>Không có loại sản phẩm nào bạn tìm kiếm</th>
        </tr>";
    }
?>
</table>