<?php
    include '/NienLuanCS/connection/connection.php';
    $tk = $_GET['tk'];
    if($tk == ""){
        $sql = "SELECT * from thuonghieu order by ma_loaisp";
    }else{
        $sql = "SELECT * from thuonghieu where (ma_th LIKE '%".$tk."%') or (ten_tenth LIKE '%".$tk."%') order by ma_loaisp";
    }
    $result = $con->query($sql);
?>
    <table border="1">
        <tr>
            <th rowspan="2">STT</th>
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
    $i = 0;
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){ 
            echo "
            <tr>
                <td>".($i = $i + 1)."</td>
                <td>".$row['ma_loaisp']."</td>
                <td>".$row['ma_th']."</td>
                <td>".$row['ten_tenth']."</td>
                <td><img src='../img/".$row['img_th']."' alt='' width=160px height=40px></td>
                <td><a href='../admin/sua_th.php?id=".$row['id_th']."'><img src='../img/edit.png' alt=''></a></td>
                <td><a href='../admin/xoa_th.php?id=".$row['id_th']."'><img src='../img/delete.png' alt=''></a></td>
            </tr>";
        }
    }else{
        echo "
        <tr>
        <th colspan='7'>Không có loại sản phẩm nào bạn tìm kiếm</th>
        </tr>";
    }
?>
</table>