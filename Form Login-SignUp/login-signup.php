<?php session_start() ;?>
<?php
 
   include './ketnoi.php';
   
    if(isset($_POST['btn_dangnhap']) && $_POST['username_login'] != '' && $_POST['password_login'] != ''){
        $ten = $_POST['username_login'];
        $mk = $_POST['password_login'];

        // $mk=md5($mk);

        $sql = "SELECT * FROM taikhoan where TenTK = '$ten' and MatKhau = '$mk'";
        $query = mysqli_query($con, $sql);
        $dem = mysqli_num_rows($query);
        
        if($dem >= 1 ){
            $quyen = mysqli_fetch_assoc($query);
            if($quyen['Quyen'] == '1'){
  
                $_SESSION['user'] = $ten ; 
                $_SESSION['bill'] = array();
                $_SESSION['password'] = $mk ; 
                 
                 header ('Location:../Trang-chu-admin/home-admin.php'); 
                
            }
            else{
                echo "<script>alert(' Bạn không có quyền vào trang này');</script>";
            }
           
        }else{
            echo "<script>alert(' Sai tên đăng nhập hoặc mật khẩu');</script>";
            
        }
    } 


    if(isset($_POST['btn_dangky'])){
        $hoten = $_POST['hoten'];
        $tendky = $_POST['username'];
        $mkdky = $_POST['password'];
        
        $remkdky = $_POST['repassword'];
        $email = $_POST['email'];
  
        if ($mkdky != $remkdky){
            echo "<script> alert('Mật Khẩu không giống');</script>";    
        }
        $sql = "SELECT * FROM taikhoan WHERE TenTK= '$tendky'";
        $old = mysqli_query($con,$sql);
        // $mkdky = md5($mkdky); 
        
        if(mysqli_num_rows($old)>0){
            echo "<script> alert('Tên đăng nhập đã tồn tại');</script>";    
              
        }else{
            $sqldky = "INSERT INTO taikhoan(TenTK, MatKhau, HoTen, Email ) values ('$tendky','$mkdky','$hoten','$email')";
            $querydky = mysqli_query($con, $sqldky);
            echo "<script> alert('Đăng ký thành công');</script>";
        }


       
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-Signup</title>
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="login-signup.css">
    <script src="../jquery-3.6.0.min.js"></script>
    <script src="form-login-signup1.js"></script>
</head>
<style>
 *{
margin: 0;
padding: 0;
}
/* .container{
    width: 100%;
    height: 750px;
    display: flex;
    justify-content:center;
    align-items:center;
} */
body{
    background-image: url(../image/background.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
}
.form-login{
    transition: 3s;
    position: absolute;
    margin-top: 200px;
    border-radius: 10px;
    top: 50%;
    left: 40%;
   margin-bottom: 400px;
    width: 250px;
    height: 350px;
    border: 3px solid black;
    background-color: #00000087;
    animation: mau-khung 2s infinite;
}
@keyframes mau-khung {
    0%{
        border: 3px solid black;
  
    }
    25%{
        border: 3px solid gold;

    }
    50%{
        border: 3px solid green;
     
    }
    75%{
        border: 3px solid violet;
    }
    100%{
        border: 3px solid blue;
    }
}
.form-login label{
    font-weight: bold;
    color:ghostwhite;
    opacity: 0.7;
    font-size: 20px;
    padding-bottom: 10px;
    display: flex;
    justify-content: center;
    margin-top: 5px;
}
.form-login img{
    width: 130px;
    height: 130px;
    margin-left: 60px;
}
.form-login input{
    border-radius: 10px;
    width: 230px;
    height: 30px;
    margin-bottom: 10px;
    margin-top: 10px;
    margin-left: 8px;
    box-shadow: 1px 1px black;
    opacity: 0.7;
}
.user-input{
    position: relative;
}
.user{
    position: absolute;
    right: 20px;
    top:190px
}
.passworld-input{
    position: relative;
}
.passworld{
    position: absolute;
    right: 20px;
    top:245px
}
.lock{
    position: absolute;
    right: 20px;
    top:299px
}
.form-login button i{
    color: black;
    padding-right: 5px;
  font-size: 14px;
}
.form-signup button i{
    color: black;
    padding-right: 5px;
  font-size: 14px;
}
.form-login button{
    color: whitesmoke;
    border: 3px solid black;
    cursor: pointer;
    width: 100px;
    height: 30px;
    background-color: red;
    font-weight: bold;
    font-size: 10px;
    margin-left: 16px;
    margin-top: 15px;
    box-shadow: 1px 1px black;
}

.form-signup{
    transition:2s;
    border-radius: 10px;
    position: absolute;
    opacity: 0;
    visibility: hidden;
    margin-top:185px;;
    width: 250px;
    height: 500px;
    border: 3px solid black;
    background-color: #00000087;
    animation: mau-khung 2s infinite;
}
@keyframes mau-khung {
    0%{
        border: 3px solid black;
  
    }
    25%{
        border: 3px solid gold;

    }
    50%{
        border: 3px solid green;
     
    }
    75%{
        border: 3px solid violet;
    }
    100%{
        border: 3px solid blue;
    }
}
.form-signup label{
    font-weight: bold;
    color:ghostwhite;
    opacity: 0.7;
    font-size: 20px;
    padding-bottom: 10px;
    display: flex;
    justify-content: center;
    margin-top: 5px;
}
.form-signup img{
    width: 130px;
    height: 130px;
    margin-left: 60px;
}
.form-signup input{
    border-radius: 10px;
    width: 230px;
    height: 30px;
    margin-bottom: 10px;
    margin-top: 10px;
    margin-left: 8px;
    box-shadow: 1px 1px black;
    opacity: 0.7;
}
.form-signup button{
    border: 3px solid black;
    color:whitesmoke;
    cursor: pointer;
    width: 100px;
    height: 30px;
    background-color: red;
    font-weight: bold;
    font-size: 10px;
    margin-left: 16px;
    margin-top: 8px;
    box-shadow: 1px 1px black;
}
.an-di-form-login{
    margin-left: 550px;
    transition-delay: 2s;
    opacity: 0;
    visibility: hidden;
    transition: 2s;
}
.hien-ra-form-sign-up{
 margin-left: 600px;
    opacity: 1;
    transition: 2s;
    visibility: visible;
    transition-delay: 2s;
}


</style>
<body>
    <div class="container">
        <div class="form-login">
            <label>ĐĂNG NHẬP</label>
            <p>
            
        </p>
        <form  method="post">
            <img src="../image/logo.jpg">
            <input type="text" class="user-input" name="username_login" value="" placeholder="Nhập tài khoản" required><span><i class="fas fa-user user"></i></span>
            <input type="password" class="passworld-input"name="password_login" value="" placeholder="Nhập mật khẩu" required><span><i class="fas fa-lock passworld"></i></span>
            <button type="submit" name="btn_dangnhap" value="dangnhap"><i class="fas fa-user-plus"></i>LOGIN</button>
            <button type="button" id="btn-signup" name="" value=""><i class="fas fa-sign-in-alt"></i>SIGN UP</button>
        </form>
        </div>
        <div class="form-signup">
            <label>ĐĂNG KÝ</label>
            
        <form method="post">
            <img src="../image/logo.jpg">
            <input type="text" class="user-input" name="hoten" value="" placeholder="Họ Tên"required><span><i class="fas fa-user user"></i></span>
            <input type="text" class="user-input" name="username" value="" placeholder="Nhập tài khoản"required><span><i class="fas fa-user user"></i></span>
            <input type="text" class="passworld-input" name="password" value="" placeholder="Nhập mật khẩu"required><span><i class="fas fa-lock passworld"></i></span>
            <input type="text" class="passworld-input" name="repassword" value="" placeholder="Nhập lại mật khẩu"required><span><i class="fas fa-lock lock"></i></span>
            <input type="text" class="user-input" name="email" value="" placeholder="Email"required><span><i class="fas fa-user user"></i></span>
            <button type="submit" name="btn_dangky" value=""><i class="fas fa-sign-in-alt"></i>SIGN UP</button>
            <button type="submit" id="btn-login" name="submit" value=""><i class="fas fa-user-plus"></i>LOGIN</button>
        </form>
        </div>
    </div>
       
</body>
</html>