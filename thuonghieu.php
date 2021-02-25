<?php
    include '/NienLuanCS/connection/connection.php';
    $lsp = $_GET['lsp'];
    $sql = "SELECT * FROM thuonghieu th WHERE EXISTS (SELECT sp.id_th FROM sanpham sp WHERE sp.id_th = th.id_th) AND th.ma_loaisp= '".$lsp."'";
    $result = $con->query($sql);
    if($result->num_rows > 0){
        ?>
            <div id="thuonghieu">
        <?php
        while($row = $result->fetch_assoc()){
            echo "
                <a href='loc_sp.php?lsp=".$row['ma_loaisp']."&ma_th=".$row['ma_th']."'><img src='./img/".$row['img_th']."' alt=''></a>
            ";
        }
        ?>
            </div>
        <?php
    }
?>