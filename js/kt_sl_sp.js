function thanhtoan() {
    var check_muasp = document.getElementById("tamtinh").innerHTML;
    if (check_muasp == "Tạm tính: 0 Đ") {
        alert("Yêu cầu chọn sản phẩm trước khi mua hàng!!!");
        return false;
    }
    if (confirm("Bạn có chắc chắn thanh toán sản phẩm")) {
        return true;
    } else {
        return false;
    }
    return true;
}    