<?php 
session_start();

require 'functions.php';
//cek cookie

if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    //ambil usernamer berdasarkan id

   $result = mysqli_query($conn,"SELECT User FROM user WHERE ID = $id"); 

   $row = mysqli_fetch_assoc($result);

   //cek coockie dan username

   if ($key === hash('sha256', $row['User'])) {
       $_SESSION['login'] = true;
   }


}

// cek session


if(isset($_SESSION["login"])) {
    header("Location: index.php");
}



//cek apakah submit sudah ditekan atau belum
if( isset($_POST["login"])) {
    

    $username = $_POST["username"];
    $password = $_POST["password"];

    $cek = mysqli_query($conn, "SELECT * FROM user WHERE User = '$username'");

    //kalau tidak ada nilai 0 (cek username)
    if( mysqli_num_rows($cek) === 1) {

        //cek password
        $row = mysqli_fetch_assoc($cek);
        if (password_verify($password, $row["Password"]) ) {

            //SET SESSION
            $_SESSION["login"] = true;

            //cek cookie
               if (isset($_POST['remember'])) {

                  setcookie('id',$row['ID'], time()+120);
                  setcookie('key',hash('sha256', $row['User']),time()+120);
               }

            header("Location: index.php");
            exit;
        }
        
    } else {

    $error = true;}
}


?>

<!DOCTYPE html>
<head>
    
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>


<body>
    <div id="login">
        <h3 class="text-center text-white pt-5"></h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label>
                                <input type="text" name="username" id="username" class="form-control" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                 <label for="remember">Remember me?</label>
                                <input type="checkbox" name="remember">
                            </div>
                            <div>
                                <button type="submit" name="login" class="btn btn-info btn-md" value="submit">Login</button>
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="regist.php" class="text-info">Register here</a>

                            </div>
                            <div>
                                <?php if (isset($error)) :  ?>
                                <p style="color: red; font-style: italic;">Username/Password salah</p>
                                <?php endif; ?>
                            </div>
                     
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
