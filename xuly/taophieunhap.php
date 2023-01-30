<?php
session_start();
include '../connetdb.php';
if(isset($_POST['trolai']))
{
    header('location:../San-pham/san-pham.php');
}
if (!empty($_POST['luu'])) {
//    $id_donhang = $_POST['id_donhang'];
//    $tonggia = $_POST['tongtien'];
    $ngaynhap = $_POST['ngaynhap'];
    $ghichu = $_POST['ghichu'];
//    $tenNCC = $_POST['NCC'];
    $nguoiban = $_POST['nguoinhap'];
    
    

    $sqlDNH = "INSERT INTO `dondathang`(`NgayNhap`, `NguoiNhap`, `GhiChu`) 
                VALUES ('$ngaynhap','$nguoiban','$ghichu')";
    $sqlCT = mysqli_query($connet, $sqlDNH);
    $id = $connet->insert_id;

    if (!empty($_SESSION['dathang'])) {
        foreach ($_SESSION['dathang'] as $key => $value) {
            $MaSP = $value['id'];
            $TenSP = $value['tensanpham'];
            $giaban = $value['giasp'];
            $soluong = $value['soluong'];
            $thanhtien = $soluong * $giaban;         

            $sqlCTDH = "INSERT INTO `ct_dathang`( `id_donnhap`, `MaSP`, `TenSP`, `GiaVon`, `SoLuong`, `ThanhTien`)
                        VALUES ('$id','$MaSP','$TenSP','$giaban','$soluong','$thanhtien')";
            $sqlCT = mysqli_query($connet, $sqlCTDH);

            $sqlupdatesl="UPDATE sanpham set SoLuong = (SELECT (SUM(SoLuong)+(SELECT SUM(SoLuong) FROM ct_dathang WHERE MaSP ='$MaSP' and id_donnhap = $id)) from sanpham WHERE  MaSP = '$MaSP') WHERE MaSP = '$MaSP'";
            $sqlCT = mysqli_query($connet, $sqlupdatesl);
        }
        unset($_SESSION['dathang']);
        header('Location: ../taophieunhap.php?taophieunhap=1');
    } else {
        header('Location: ../taophieunhap.php?taophieunhap=0');
    }
}




