

     <h1 style="text-align: center;">» Login Administrador »</h1>
	 <hr/>

	 
	 <!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<style rel="stylesheet">
	.table{
		width:50%;
		text-align:center;
		margin:0 auto;
	}
	</style>
	
	
	
<form  action="" method="post" style="width: 50%; margin: 0 auto;">

   <div class="form-group">
      <label for="exampleInputPassword1">Mail</label>
	  <input type="text" class="form-control" name="Mail" placeholder="prueba@gmail.com"required>
    </div>

   <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
	  <input type="text" class="form-control" name="Password" placeholder="Password"required>
    </div>

    <div class="form-group" style="text-align:center;">
     <button type="submit" name="login" class="btn btn-primary">Login</button>
    </div>
	
</form>

<?PHP	
if(isset($_POST['login'])){
	
	$link = new mysqli('localhost','root','','veterinaria');
	
	if ($link->connect_errno) {
			echo "Falló la conexión a MySQL: (" . $link->connect_errno . ") " . $link->connect_error;
		}else{
			$mail = $_POST['Mail'];
			$password = $_POST['Password'];
			$sql ="SELECT password FROM administrador WHERE mail = '$mail' and password = '$password'";

			$result = $link->query($sql);
			
			if($result->fetch_assoc()){
				
				session_start();
				$_SESSION['Reg']='ok';
				header('Location: index.php');
			}else{
				$_SESSION['Reg']='fail';
				echo "Usuario o Contraseña Incorrecto";
			}
		}
	mysqli_close($link);
}
?>