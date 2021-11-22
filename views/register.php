    <!-- <h1>Create an account</h1>
    <?php $form = app\core\Form\Form::begin('', "post") ?>
    <div class="row">
        <div class="col">
            <?php echo $form->field($model, 'firstname') ?>
        </div>
        <div class="col">
            <?php echo $form->field($model, 'lastname') ?>
        </div>
    </div>
    <?php echo $form->field($model, 'email') ?>
    <?php echo $form->field($model, 'phone_number') ?>
    <?php echo $form->field($model, 'address') ?>
    <?php echo $form->field($model, 'password')->passwordField() ?>
    <?php echo $form->field($model, 'passwordConfirm')->passwordField() ?>
    <button type="submit" class="btn btn-primary">Submit</button>
    <?php app\core\form\Form::end() ?>   -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<!-- <head>
	<title>register Page</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->

</head> -->
<link rel="stylesheet" type="text/css" href="/css/register.css">
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Đăng ký</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form>
					<div class="input-group form-group"><!------------------------------------------------------------------>
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Họ" require="Xin điền Họ của bạn">	
					</div>
					<div class="input-group form-group"><!------------------------------------------------------------------>
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Tên" require="">	
					</div>
					<div class="input-group form-group"><!------------------------------------------------------------------>
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="char(10)" class="form-control" placeholder="Số điện thoại" require="">	
					</div>
					<div class="input-group form-group"><!------------------------------------------------------------------>
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Email" require="">	
					</div>
					<div class="input-group form-group"><!------------------------------------------------------------------>
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Địa chỉ giao hàng" require="">	
					</div>
					<div class="input-group form-group"><!------------------------------------------------------------------>
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Username" require="">	
					</div>
					<div class="input-group form-group"><!------------------------------------------------------------------>
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="Mật khẩu" require="">
					</div>
					<div class="input-group form-group"><!------------------------------------------------------------------>
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="repassword" class="form-control" placeholder="Nhập lại mật khẩu">	
					</div>
					<!-- <div class="row align-items-center remember">
						<input type="checkbox">Ghi nhớ đăng nhập
					</div> -->
					<div class="form-group">
						<input type="submit" value="Đăng ký" class="btn float-right register_btn">
					</div>
				</form>
			</div>	
			<div class="card-footer">
				<div class="d-flex justify-content-center">
					<span>Bạn đã có tài khoảng?</span><a href="http://localhost:8000/login"> &nbsp Đăng nhập</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
