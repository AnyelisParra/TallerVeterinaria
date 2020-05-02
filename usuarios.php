<?php
if(!isset($_SESSION['Reg'])||$_SESSION['Reg']!='ok')header('Location: login.php');
?>


<?php
    require_once("conexion.php");
	require_once("usuario.php");
	
	$con = new conexion();
	$usuario = new usuario();
?>

<html>
<body>

<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<style rel="stylesheet">
	.table{
		width:50%;
		text-align:center;
		margin:0 auto;
	}
	</style>
	
    <div class="container">
	   <div class="content">
	   <h2> Gestión de Usuarios &raquo; Añadir Usuario</h2>
	   <hr />

            <form class="form-horizontal" action="" method="post">
				<div class="row">
					<label class="col-sm-3 control-label">Nombre completo</label>
					<div class="col-sm-2">
						<input type="text" name="nombreusuario" class="form-control" placeholder="Primer Nombre" required>
					</div>
				</div>
				<div class="row">
					<label class="col-sm-3 control-label">Cedula</label>
					<div class="col-sm-2">
						<input type="text" name="idusuario" class="form-control" placeholder="Segundo Nombre" required>
					</div>
				</div>
				<div class="row">
					<label class="col-sm-3 control-label">Email</label>
					<div class="col-sm-2">
						<input type="text" name="mail" class="form-control" placeholder="Primer Apellido" required>
					</div>
				</div>
	
				<div class="row">
					<label class="col-sm-3 control-label">Dirección</label>
					<div class="col-sm-2">
						<input type="text" name="direccion" class="form-control" placeholder="Numero de Identificación" required>
					</div>
				</div>
				<div class="row">
					<label class="col-sm-3 control-label">Telefono</label>
					<div class="col-sm-2">
						<input type="text" name="telefono" class="form-control" placeholder="Telefono" required>
					</div>
				</div>
	
				<div class="row">
					<div class="col-sm-6">
						<input type="submit" name="ingresarusuario" class="btn btn-sm btn-success" value="Ingresar Usuario">
					</div>
			
				</div>
			</form>
		</div>
	</div>



<?php
	if(isset($_POST['ingresarusuario'])){

			        $nombreusu = $_POST['nombreusuario'];
					$cedulausuario	= $_POST['idusuario'];
					$mail	= $_POST['mail'];
					$direccion = $_POST['direccion'];
					$telefono = $_POST['telefono'];
					$result=$usuario->agregar($nombreusu,$cedulausuario, $mail ,$direccion, $telefono,$con->conectar());
				 
			if($result==true){
				echo"Usuario Creado Exitosamente";
			}else{
				echo"Error al crear el Usuario ";
			}
		
	
    }
?>


<?php
		
	if(isset($_POST['enviar1'])){
		$arr=$usuario->update($_POST["nombreusuario"],$_POST["idusuario"],$_POST["mail"], $_POST["direccion"],$_POST["telefono"],$con->conectar());
	}
	
	if(isset($_POST['enviar2'])){
		$usuario->delete($_POST["idusuario"],$con->conectar());
	}
	
	$arr=$usuario->listar($con->conectar());
	for($i=0;$i<count($arr);$i++){
?>


		<form method="post" action="" class="form-horizontal">
		<div class="row">
		   <div class="col-sm-2">
			<input type="Text" class="form-control" name="nombreusuario"  placeholder="Nombre Usuario"  value=<?php echo $arr[$i]['nombreusuario']?>>
		   </div>
		   <div class="col-sm-2">
			<input type="Text" class="form-control" name="idusuario"  readonly="readonly" placeholder= "Cedula Usuario"value=<?php echo $arr[$i]['idusuario']?>>
			</div>
			<div class="col-sm-3">
			<input type="Text" class="form-control" name="mail"  placeholder= "prueba@gmail.com" value=<?php echo $arr[$i]['mail']?>>
			</div>
			<div class="col-sm-2">
			<input type="Text" class="form-control" name="direccion" placeholder= "Dirección" value=<?php echo $arr[$i]['direccion']?>>
			</div>
			<div class="col-sm-1">
			<input type="Text" class="form-control" name="telefono" placeholder= "Telefono"  value=<?php echo $arr[$i]['telefono']?>>
			</div>
			
			<div class="col-sm-1">
			<input type="Submit" name="enviar1" class="btn btn-sm btn-primary" value="Modificar">
			</div>
			
			<div class="col-sm-1">
			<input type="Submit" name="enviar2" class="btn btn-sm btn-primary" value="Eliminar">
			</div>
		</div>
		</form>

<?php
	}
	$con->desconectar();
?>


</body>
</html>