<?php
    include '/NienLuanCS/connection/connection.php';
    $tk = $_GET['tk'];
    if($tk == ""){
        $sql = "SELECT * from thanhvien";
    }else{
        $sql = "SELECT * from thanhvien where (tentaikhoan LIKE '%".$tk."%')";
    }
    $result = $con->query($sql);
?>
   <table border="1">
        <tr>
                <th rowspan="2">STT</th>
                <th rowspan="2">Ảnh đại diện</th>
                <th rowspan="2">Tên tài khoản</th>
                <th rowspan="2">GT</th>
                <th rowspan="2">Nghề nghiệp</th>
                <th rowspan="2">Xem chi tiết</th>
                <th colspan="1">Cập nhật</th>
            </tr>
        <tr>
            <th>Xóa</th>
        </tr>
<?php
    $i = 0;
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
        echo "
            <tr>
                <td>".($i = $i + 1)."</td>
                <td><img src='../img/".$row['path_anh_tv']."' alt='' width=100px height=100px></td>
                <td>".$row['tentaikhoan']."</td>
                <td>".$row['gioitinh']."</td>
                <td>".$row['nghenghiep']."</td>
                <td><a href='chitiet_kh.php'>Xem chi tiết</a></td>
                <td><a href='delete_kh.php?id=".$row['id']."'><img src='../img/delete.png' alt=''></a></td>
            </tr>";
        }
    }else{
         echo "
             <tr>
                 <td colspan='7'>Không có thành viên mà bạn cần tìm</td>
             </tr>";
    }
?>
</table>