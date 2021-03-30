<?php
    include '/NienLuanCS/connection/connection.php';
    $cout_hd_chuaduyet = 0;
    $sql_hd= "SELECT COUNT(id_hd) as count_hd FROM hoadon where trangthai = 0";
    $result_hd = $con->query($sql_hd);
    if($result_hd->num_rows > 0){
        while($row_couthd = $result_hd->fetch_assoc()){
            $cout_hd = $row_couthd['count_hd'];
        }
    }
    $cout_hd_daduyet = 0;
    $sql_hd_duyet= "SELECT COUNT(id_hd) as count_hd FROM hoadon where trangthai = 1";
    $result_hd_duyet = $con->query($sql_hd_duyet);
    if($result_hd_duyet->num_rows > 0){
        while($row_couthd_duyet = $result_hd_duyet->fetch_assoc()){
            $cout_hd_daduyet = $row_couthd_duyet['count_hd'];
        } 
    }
    echo"
        <p class='so_th'>Tổng số hoá đơn:".($cout_hd + $cout_hd_daduyet)."</p>
        <p class='so_th'>Tổng số hoá đơn chưa duyệt: ".$cout_hd."</p>
        <p class='so_th'>Tổng số hoá đơn đã duyệt: ".$cout_hd_daduyet."</p>
    ";
?>