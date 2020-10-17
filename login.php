<?php include ("loginhead.php");?>
  <?php
	include('config.php');
	session_start();
	$error=array();
	if(isset($_POST['submit'])){
		$username=isset($_POST['username'])?$_POST['username']:'';
		$password=isset($_POST['password'])?$_POST['password']:'';
		
		if(sizeof($error)==0){
			$sql = "SELECT * FROM user WHERE Username='".$username."'AND Password='".$password."'";
			$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$_SESSION['userdata']=array('username'=>$row['Username']);	
				//print_r($_SESSION);
				if($row["Role"]=="Admin"){
					header('Location:products.php');
				}
				else{
					header('Location:product.php');
				}
				
			}
		} 
		else{
			$error[]=array('input'=>'username','msg'=>'Invalid Login');	  
		}
		$conn->close();
		}
	}
?>
	<body id="login">
		
		<div id="login-wrapper" class="png_bg">
			<div id="login-top">
			
				<h1>Simpla Admin</h1>
				<!-- Logo (221px width) -->
				<img id="logo" src="resources/images/logo.png" alt="Simpla Admin logo" />
			</div> <!-- End #logn-top -->
				<?php if(sizeof($error)!=0) : ?>
				<?php foreach ($error as $err):?>
					<li><?php echo $err["msg"]; ?></li>
				<?php endforeach ; ?>
			<?php endif ; ?>
			<div id="login-content">
				
				<form action="" method="POST">
				
					<div class="notification information png_bg">
						<div>
							Please Sign In!
						</div>
					</div>
					
					<p>
						<label>Username</label>
						<input class="text-input" name="username" type="text" />
					</p>
					<div class="clear"></div>
					<p>
						<label>Password</label>
						<input class="text-input" name="password" type="password" />
					</p>
					<div class="clear"></div>
					<p id="remember-password">
						<input type="checkbox" />Remember me
					</p>
					<div class="clear"></div>
					<p>
						<input class="button" name="submit" type="submit" value="Sign In" />
					</p>
					
				</form>
			</div> <!-- End #login-content -->
			
		</div> <!-- End #login-wrapper -->
  </body>
</html>
