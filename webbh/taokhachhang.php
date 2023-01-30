<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="taokhachhang.css">
</head>
<body>
    <div id="header"></div>
      <div class="menu">
        <h2 style="font-weight: bold; color: grey">Tạo mới khách hàng</h2>
        <p>______________________________________________________________________</p>
        <b>Mã khách hàng</b>
        <input type="text" placeholder=" Mã khách hàng(tự sinh nếu bỏ trống) " style="width:370px; height: 25px; margin-left: 45px;">
        <br><br>
        <b>Tên khách hàng</b>
        <input type="text" placeholder=" Nhập tên khách hàng( bắt buộc ) " name = "tenkh" style="width:370px; height: 25px; margin-left: 42px;">
        <br><br>
       
        <b>Email</b>
        <input type="text" placeholder=" Nhập email khách hàng( vd: tk10@gmail.com ) " style="width:370px; height: 25px; margin-left: 110px;">
        <br><br>

        <b>Địa chỉ</b>
        <input type="text" style="width:370px; height: 25px; margin-left: 103px;">
        <br><br>

        <b>Ghi chú</b>
        <input type="text" style="width:370px; height: 25px; margin-left: 96px;">
        <br><br>

        <b>Ngày thêm</b>
        <input type="date" id="customer_birthday" name="customer_birthday" class="form-control txttimes" value placeholder=" yyyy-mm-dd " style="width:370px; height: 25px; margin-left: 82px;">
        <br><br>
          
        <p>______________________________________________________________________</p>
        <button type="button" name="luu" value="luu"  style="width:60px; height:35px; color: white; background-color:rgb(49, 49, 110); margin-left: 370px"><b>✔ Lưu</b></button>
        <button type="button" name="boqua" value="boqua"  style="width:100px; height:35px; color: black; background-color:rgb(210, 210, 221);"><b>⟲ Bỏ qua</b></button>
      </div>
      <div id="right"></div>        
      <div id="footer"></div>
</body>
</html>