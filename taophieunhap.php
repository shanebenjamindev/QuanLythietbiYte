<?php
session_start();


$txtSearch = !empty($_GET['tbTim']) ? $_GET['tbTim'] : null;
$listProduct = !empty($_SESSION['dathang']) ? $_SESSION['dathang'] : [];
$listProductResult = [];

if (!empty($txtSearch)) {
    foreach ($listProduct as $key => $value) {
        // $key: $id
        // $value: $array[$i];
        $name = $value['tensanpham'];
        if (strpos($name, $txtSearch) !== false || strpos($key, $txtSearch) !== false) {
            $listProductResult[$key] = $value;
        }
    }
} else {
    $listProductResult = $listProduct;
}
if(isset($_GET['ThemSP']))
{
    header('location:San-pham/san-pham.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="taophieunhap.css">
</head>
<style>
    .icon1 {
        margin-left: 10px;
    }

    .icon {
        margin-right: 10px;
    }
</style>
<body>
<div id="header">

    <?php if (isset($_GET['taophieunhap']) && $_GET['taophieunhap']): ?>
        <h3 style="color: green;">Tạo phiếu nhập thành công</h3>
    <?php elseif (isset($_GET['taophieunhap'])): ?>
        <h3 style="color: red;">Tạo phiếu nhập thất bại</h3>
    <?php endif; ?>

    <div id="hh">
        <h2 style="font-weight: bold;">Tạo phiếu nhập</h2>
    </div>
</div>
<div class="aaa">
    <div id="menu" style="margin-right: 30px;">
        <div class="tt">
            <form action="" method="get">
                <input type="text" name="tbTim" class="input-group" value="<?php echo $txtSearch; ?>"
                       placeholder="Nhập vào ô để tìm kiếm">
                       <button type="submit" name="ThemSP"class="btn-1">Thêm Sản Phẩm</button>
                <button type="submit" class="btn-1"><span><i class="fa fa-search icon"></i></span>Tìm</button>
            </form>
            <table style=" margin-top:10px;background-color:yellow; width: 820px; height: 40px">
                <tr style="text-align:center;font-family:Arial, Helvetica, sans-serif; background-color:rgb(212, 224, 230)">
                    <td><b>STT</b></td>
                    <td><b>Mã hàng</b></td>
                    <td><b>Tên sản phẩm</b></td>
                    <td><b>Số lượng</b></td>
                    <td><b>Giá bán</b></td>
                    <td><b>Thành tiền</b></td>
                    <td><b>Xóa</b></td>
                    <td></td>
                </tr>
                <?php
                $i = 0;
                $tongtien = 0;
                $thanhtien = 0;
                ?>
                <?php if (!empty($_SESSION['dathang'])): ?>
                    <?php foreach ($listProductResult as $item): ?>
                        <?php
                        $thanhtien = $item['soluong'] * $item['giasp'];
                        $tongtien += $thanhtien;
                        $i++;
                        ?>
                        <tr style="text-align:center;font-family:Arial, Helvetica, sans-serif; background-color:rgb(212, 224, 230)">
                            <td><?php echo $i ?></td>
                            <td><?php echo $item['id'] ?></td>
                            <td><?php echo $item['tensanpham'] ?></td>
                            <td>
                                <a href="testnhaphang.php?id=<?php echo $item['id'] ?>&xuli=cong"><i
                                            class="fas fa-plus icon"></i></a>
                                <?php echo $item['soluong']; ?>
                                <a href="testnhaphang.php?id=<?php echo $item['id'] ?>&xuli=tru"><i
                                            class="fas fa-minus icon1"></i></a>

                            </td>
                            <td><?php echo $item['giasp'] ?></b></td>
                            <td><?php echo $thanhtien ?></b></td>
                            <td><a href="testnhaphang.php?id=<?php echo $item['id'] ?>&xuli=xoa">Xóa</a></td>
                            <td></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Chưa có sản phẩm</p>
                <?php endif; ?>
                <tr style="text-align:center;font-family:Arial, Helvetica, sans-serif; background-color:rgb(212, 224, 230)">
                    <td colspan="7  "><p style="float: left;">Tổng
                            tiền: <?php echo number_format($tongtien, 0, ',', '.') . 'vnđ' ?></p><br/></td>
                    <td>
                        <button><a href="testnhaphang.php?xuli=xoatatca">Xóa Tất Cả</a></button>
                    </td>
                </tr>
            </table>
            <div style="color:rgb(6, 77, 50);margin-top: 40px;background-color: rgb(171, 226, 206); width: 820px; height:50px;">
                <p>Gõ mã hoặc tên sản phẩm vào hộp tìm kiếm để thêm hàng vào đơn hàng</p>
            </div>
        </div>
    </div>
    <div id="right" style="margin-top: 200px">
        <form method="post" action="xuly/taophieunhap.php">
            <id id="aa">
                <b>Ngày nhập</b>
                <input type="date" name="ngaynhap" style="width:200px; height: 25px;"><br><br>
                <b>Người nhập</b>
                <select name="nguoinhap" id="bh"
                        style=" width: 209px; height: 32px; background-color: rgb(207, 203, 203);">
                    <option value="chonnvbanhang">admin</option>
                    
                    <option value="Phạm Hoàng Khang">Phạm Hoàng Khang</option>
                    <option value="Nguyễn Thanh Lễ">Nguyễn Thanh Lễ</option>
                    <option value="Trần Tấn Phát">Trần Tấn Phát</option>
                    <option value="Triệu Đoan Chí Vĩ">Triệu Đoan Chí Vĩ</option>
                    <option value="Võ Phong Giang">Võ Phong Giang</option>
                </select>
                <br><br>
                <b>Ghi chú</b>
                <textarea id="ghichu" name="ghichu" rows="4" cols="50"
                          style=" width: 203px; height:55px"></textarea><br><br>
                <a style=" color: rgb(4, 224, 213)">Thông tin thanh toán</a>
                <p>__________________________________________________</p>

                
                <br>
                
                <button type="submit" name="luu" value="luu"
                        style="width:100px; height:35px; color: white; background-color:rgb(96, 96, 197); border-radius: 5px">
                    Lưu
                </button>
               
                <button type="sumit" name="trolai" value="trolai"
                        style="width:100px; height:35px; color: white; background-color:rgb(96, 96, 197); border-radius: 5px">
                    Trở lại
                </button>
            </id>
        </form>
    </div>
</div>
<div id="footer"></div>
</body>
</html>