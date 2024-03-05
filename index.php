<?php
// khai bao bien
$error = "";
$hoa_don = $_POST["hoadon"] ?? '';
$ttnhacc = $_POST["ttnhacc"] ?? '';
$motadonnhap = $_POST["motadonnhap"] ?? '';
$products = $_POST["products"] ?? '';
$soluongsp = $_POST["soluongsp"] ?? '';
$price = $_POST["price"] ?? '';
$motasp = $_POST["motasp"] ?? '';
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    // tạo kết nối với database
    global $conn;
    $db_user = "root";
    $db_password = "";
    $db_name = "QUANLY_SP";
    $db_host = "localhost";
    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);
    // insert dữ liệu
    $sql = "INSERT INTO NhAPKHO AND NK_DETAIL(hoa_don, ttnhacc, motadonnhap, products, soluongsp, price, motasp ) VALUE (?, ?, ?, ?, ?, ?, ?) ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $hoa_don, $ttnhacc, $motadonnhap, $products, $soluongsp, $price, $motasp);
    $stmt->execute();
    // chuyển trang đến trang list.php
    header("location: list.php");
    // thông báo thành công
    $error = "Successfull";
}
?>
<!DOCTYPE html>
<html lang="en">

<body>
    <form action="index.php" method="post">
        <input placeholder="Số hóa đơn nhập kho" type="number" name="hoadon" id="hoadon" required>
        <select placeholder="Thông tin về nhà cung cấp" name="ttnhacc" id="option">
            <option value="">CustomerID</option>
            <option value="">Decribe</option>
            <option value="">Note</option>
        </select>
        <input placeholder="Mô tả về đơn nhập kho" type="text" name="motadonnhap">
        <select placeholder="Chọn sản phẩm" name="products" id="">
            <option value="">sp1</option>
            <option value="">sp2</option>
            <option value="">sp3</option>
        </select>
        <input placeholder="Nhập số lượng sản phẩm" type="number" name="soluongsp">
        <input placeholder="Giá của sản phẩm" type="number" name="price">
        <input placeholder="Mô tả thêm về sản phẩm" type="text" name="motasp">
</body>

</html>