<?php
session_start();

include 'connetdb.php';
#xoataca
if(!empty($_GET['xuli']))
{
    if($_GET['xuli']=='xoatatca')
    {
        unset($_SESSION['dathang']);
    }
}
if (!empty($_GET['id'])) {
    if (!empty($_GET['xuli'])) {
        if ($_GET['xuli'] == 'xoa') {
            // xoa
            unset($_SESSION['dathang'][$_GET['id']]);
        }
        else
        {
            $id = $_GET['id'];
            $soluong = 1;
            $sql = "SELECT * FROM `sanpham`WHERE MaSP='" . $id . "'";
            $query = mysqli_query($connet, $sql);
            $row = mysqli_fetch_array($query);

            if ($row)
            {
                $new_product = array('tensanpham' => $row['TenSP'], 'id' => $id, 'soluong' => $soluong, 'giasp' => $row['GiaVon']);

                if (!empty($_SESSION['dathang']))
                {
                    $tontai = false;
                    foreach ($_SESSION['dathang'] as $item)
                    {
                        if ($item['id'] == $new_product['id'])
                        {
                            // cong va tru
                            if ($_GET['xuli'] == 'tru')
                            {
                                if($_SESSION['dathang'][$new_product['id']]['soluong'] == 1)
                                {
                                    unset($_SESSION['dathang'][$new_product['id']]);
                                }
                                else
                                {
                                    $_SESSION['dathang'][$new_product['id']]['soluong'] -= $soluong;
                                }
                                $tontai = true;
                            }
                            else
                            {
                                $_SESSION['dathang'][$new_product['id']]['soluong'] += $soluong;
                                $tontai = true;
                                break;
                            }
                        }
                    }
                    if (!$tontai)
                    {
                        $_SESSION['dathang'][$new_product['id']] = $new_product;
                    }
                }
                else
                {
                    $_SESSION['dathang'][$new_product['id']] = $new_product;
                }


            }
        }
    }
}

header('Location:taophieunhap.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

</body>
</html>