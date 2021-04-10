<?php
	include_once('header.php');


	require_once("entities/user.class.php");
	
    if(isset($_POST['btn_login'])){

		$u_name = $_POST['userName'];
		$u_pass = $_POST['userPass'];

		if(empty($u_name) || empty($u_pass)){
			?>
				<script>alert("Please enter all fields")</script>
			<?php
		}
		$user = User::checkLogin($u_name, $u_pass);
		$count = mysqli_num_rows($user);
		if($count==1){
			$_SESSION['user'] = $u_name;
			header("Location: /LAB3/list_product.php");
		} else{
			?>
			<script>alert("Something went wrong! Please check again...")</script>
			<?php
		}
		
	}
?>    
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content" style="width: 500px; place-self: center;">
		<div class="p-5">
			<div class="text-center">
				<h1 class="h4 text-gray-900 mb-4">Login</h1>
			</div>
			<form class="user" method="post">
				<div class="form-group">
					<input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="userName" placeholder="User name" required>
				</div>
				<div class="form-group">
					<input type="password" class="form-control form-control-user" id="exampleInputPassword" name="userPass" placeholder="Password" required>
				</div>
				<button type="submit" name="btn_login" class="btn btn-primary btn-user btn-block w-100">Login</button>
			</form>
		</div> 
	</div>
    </div>
<?php include_once("footer.php")?>     