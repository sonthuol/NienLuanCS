<?php
    if(isset($_GET['lsp'])){
        $lsp = $_GET['lsp'];
    }
    if(isset($_GET['ma_th'])){
        $ma_th = $_GET['ma_th'];
    }
    if(isset($_GET['gia'])){
        $gia = $_GET['gia'];
    }    
    if(isset($_GET['khuyenmai'])){
        $khuyenmai = $_GET['khuyenmai'];
    }
    if(isset($_GET['sosao'])){
        $sosao = $_GET['sosao'];
    }
    if(isset($_GET['sapxep'])){
        $sapxep = $_GET['sapxep'];
    }
    $boloc = "?";

    if(isset($lsp)){
        $boloc = $boloc . "lsp=".$lsp;
    }
    if(isset($ma_th)){
        $boloc = $boloc . "&ma_th=" . $ma_th;
    }
    if(isset($khuyenmai)){
        $boloc = $boloc . "&khuyenmai=" . $khuyenmai;
    }
    if(isset($sosao)){
        $boloc = $boloc . "&sosao=" . $sosao;
    }
    if(isset($sapxep)){
        $boloc = $boloc . "&sapxep=" . $sapxep;
    }
    echo $boloc;
    echo "<a href='locsp.php".$boloc."&gia=10000-2000'>Gia</a>";
?>

