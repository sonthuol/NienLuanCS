<div id="noidung">
    <?php  
        include '/NienLuanCS/connection/connection.php';
        $sql = "SELECT * from sanpham where khuyenmai = 'Trả góp' group by ten_sp limit 0, 5";
        $result = $con->query($sql);
        if($result->num_rows > 0){
            echo "<div id='dienthoai'>
                        <div class='tieude tragop'>
                            <h2><i class='fas fa-angle-double-right'></i>Trả góp</h2>
                        </div>
                        <div class='danhsachsanpham'>";
            while($row1 = $result->fetch_assoc()){
                    $gia_goc = number_format($row1['gia_sp'], 0, '', ',');
                    $gia_giam = number_format($row1['gia_sp']-($row1['gia_sp']*0.05), 0, '', ',');
                    echo "
                        <div class='sanpham'>
                            <a href='chitietsanpham.php?idsp=".$row1['id_sp']."'>";
                            echo "<p class='tragop'>Trả góp ".$row1['giatrikhuyenmai']."%</p>";

                    echo "
                                <img src='./img/".$row1['img_sp']."' alt=''>
                                <div class='ttsp'>
                                    <p class='tensp'>".$row1['ten_sp']."</p>
                                    <div class='giamgia_phantram'>
                                        <p class='giamgia'>".$gia_giam."<u>đ</u></p>
                                        <p class='phantramgiam'>-5%</p>
                                    </div>
                                    <p class='giagoc'>".$gia_goc."<u>đ</u></p>
                                    <div class='start'>
                        ";
                            for($i = 1; $i <= $row1['sosao']; ++ $i){
                                echo "<i class='fas fa-star'></i>";
                            }
                    echo"
                                        <p class='danhgia'>".$row1['danhgia']." đánh giá</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    ";
                }
            echo "  </div>
            </div>
            ";
        }else{
            echo "";
        }
    ?>
</div>