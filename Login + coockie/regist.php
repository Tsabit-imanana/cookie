<!DOCTYPE html>
<?php 
require 'functions.php';

if (isset($_POST["regist"])) {
	
	if (regist($_POST) > 0) {
		echo "
			<script>
				alert('Registrasi user berhasil!');
			</script>
		";
	} else {

		echo mysqli_error($conn);
	}
}


 ?>
<html>
<head>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<title>Halaman registrasi</title>
		<style >
			label {
				display: block;
			}

		</style>
</head>
<body>
<div id="login">
        <h3 class="text-center text-white pt-5"></h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Regist</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label>
                                <input type="text" name="user" id="username" class="form-control" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                               <label for="password" class="text-info">Confirm Password:</label>
                                <input type="password" name="password2" id="password" class="form-control">
                            </div>
                            <div id="register-link" class="text-right">
                                <button type="submit" name="regist">Sign Up</button>
                            </div>
                         	<div>
                         		<a href="login.php">Back?</a>
                         	</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>