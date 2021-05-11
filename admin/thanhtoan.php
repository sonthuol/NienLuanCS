<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/them_lsp_th_sp.css">
    <link rel="stylesheet" href="../css/danhsach_lsp_th_sp.css">
    <link rel="stylesheet" href="../css/thanhtoan.css">
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
        <div id="noidungthanhtoan">
            <div id="from_thongtinkhachhang">
            <h2>Thanh toán</h2>
                <form action="">
                    <label for="">Tên KH:</label>
                    <input type="text" name="tenkhachhang" placeholder="Nhập tên khách hàng">
                    <label for="">SĐT:</label>
                    <input type="text" name="số điện thoại" placeholder="Nhập số điện thoại">
                </form>
            </div>
            <div id="thanhtoan">
                <div id="sanphamdachon">
                    <h4>Sản phẩm khách hàng mua</h4>
                    <div id="sanpham_khchon">
                        <table id="sanphamkhchon">
                            <tr>
                                <td>STT</td>
                                <td>Mã SP</td>
                                <td>Tên sản phẩm</td>
                                <td>số lượng</td>
                                <td>Đơn giá</td>
                                <td>Thành tiền</td>
                                <td>Xoá</td>
                            </tr>
                        </table>
                        <div id="thanhtoandonhang">
                            <input type="submit" value=" Thanh toán">
                        </div>
                    </div>
                </div>
                <div id="sanphamcanchon">
                        <h4>Tìm kiếm sản phẩm</h4>
                        <input type="text" onkeyup="timkiemsanphamthanhtoan(this.value)">
                        <div id="showsanpham">
                        </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function timkiemsanphamthanhtoan(str) {
            if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            } else { // code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                    document.getElementById("showsanpham").innerHTML=xmlhttp.responseText; 
                } 
            }   
            xmlhttp.open("GET", "../ajax/timkiem_sp_thanhtoan.php?tk="+str, true);
            xmlhttp.send();
        }
        
        function chonsanpham_thanhtoan(idsp){            
            var tensp = document.getElementById('tensp_'+idsp).innerHTML;
            var giaban = document.getElementById('gia_sp_'+idsp).innerHTML;
            var bang = document.getElementById("sanphamkhchon").innerHTML;
            document.getElementById('sanphamkhchon').innerHTML = bang + "<tr id="+idsp+">"+"<td>1</td>"+"<td>"+idsp+"</td>"+"<td>"+tensp+"</td>"+"<td>1</td>"+"<td>"+giaban+"</td>"+"<td>"+giaban+"</td>"+"<td><button onclick='xoasanpham_thanhtoan("+idsp+")'><img src='../img/delete.png' alt='' width='20px' height='20px'></button></td>"+"</tr>";
        }

        function xoasanpham_thanhtoan(idsp){
            var idsp = document.getElementById(idsp).style.display = 'none';
        }
    </script>
</body>
</html>