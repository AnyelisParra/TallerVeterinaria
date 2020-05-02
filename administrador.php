<?php
if(!isset($_SESSION['Reg'])||$_SESSION['Reg']!='ok')header('Location: login.php');
?>

<?php
    require_once("conexion.php");
	require_once("admin.php");
	
	$con = new conexion();
	$admin = new admin();
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
     <h2> Gestión Administrador &raquo; Añadir Administrador</h2>
<hr />
            <form class="form-horizontal" action="" method="post">
				<div class="row">
					<label class="col-sm-3 control-label">Primer Nombre</label>
					<div class="col-sm-2">
						<input type="text" name="pnombreadmin" class="form-control" placeholder="Primer Nombre" required>
					</div>
				</div>
				<div class="row">
					<label class="col-sm-3 control-label">Segundo Nombre</label>
					<div class="col-sm-2">
						<input type="text" name="snombreadmin" class="form-control" placeholder="Segundo Nombre" required>
					</div>
				</div>
				<div class="row">
					<label class="col-sm-3 control-label">Primer Apellido</label>
					<div class="col-sm-2">
						<input type="text" name="papellidoadmin" class="form-control" placeholder="Primer Apellido" required>
					</div>
				</div>
				<div class="row">
					<label class="col-sm-3 control-label">Segundo Apellido</label>
					<div class="col-sm-2">
						<input type="text" name="sapellidoadmin" class="form-control" placeholder="Segundo Apellido" required>
					</div>
				</div>
				<div class="row">
					<label class="col-sm-3 control-label">Cedula</label>
					<div class="col-sm-2">
						<input type="text" name="idadmin" class="form-control" placeholder="Numero de Identificación" required>
					</div>
				</div>
				<div class="row">
					<label class="col-sm-3 control-label">Email</label>
					<div class="col-sm-2">
						<input type="text" name="mail" class="form-control" placeholder="prueba@gmail.com" required>
					</div>
				</div>
				<div class="row">
					<label class="col-sm-3 control-label">Password</label>
					<div class="col-sm-2">
						<input type="text" name="password" class="form-control" placeholder="Password" required>
					</div>
				</div>
				
				
				<div class="row">
					<div class="col-sm-6">
						<input type="submit" name="agregaradmin" class="btn btn-sm btn-success" value="Añadir Administrador">
					</div>
				
					<div class="col-sm-6">
						<input type="submit" name="imprimir" class="btn btn-sm btn-primary" value="Listar Administradores">
					</div>
				</div>
			</form>
		</div>
	</div>

  

<?php

	if (isset($_POST['agregaradmin'])){
	
			        $pnombre = $_POST['pnombreadmin'];
					$snombre	= $_POST['snombreadmin'];
					$papellido	= $_POST['papellidoadmin'];
					$sapellido = $_POST['sapellidoadmin'];
					$id = $_POST['idadmin'];
					$mail		= $_POST['mail'];
					$password	= $_POST['password'];
                    $result=$admin->agregar($pnombre,$snombre, $papellido ,$sapellido, $id,$mail, $password,$con->conectar());
				
			if($result==true){
				echo"Administrador Creado Exitosamente";
			}else{
				echo"Error al crear el Administrador ";
			}
		
	

	}
?>
<?php

	if(isset($_POST['enviar1'])){
		$arr=$admin->update($_POST["pnombre"],$_POST["snombre"],$_POST["papellido"], $_POST["sapellido"],$_POST["id"],$_POST["mail"], $_POST["password"],$con->conectar());
	}
	
	$arr=$admin->listar($con->conectar());
	for($i=0;$i<count($arr);$i++){
?>

		<form method="post" action="" class="form-horizontal">
		<div class="row">
		   <div class="col-sm-1">
			<input type="Text" class="form-control" name="pnombre"  placeholder="Primer Nombre"  value=<?php echo $arr[$i]['pnombreadmin']?>>
		   </div>
		   <div class="col-sm-1">
			<input type="Text" class="form-control" name="snombre" placeholder= "Segundo Nombre"value=<?php echo $arr[$i]['snombreadmin']?>>
			</div>
			<div class="col-sm-1">
			<input type="Text" class="form-control" name="papellido"  placeholder= "Primer Apellido" value=<?php echo $arr[$i]['papellidoadmin']?>>
			</div>
			<div class="col-sm-1">
			<input type="Text" class="form-control" name="sapellido" placeholder= "Segundo Apellido" value=<?php echo $arr[$i]['sapellidoadmin']?>>
			</div>
			<div class="col-sm-2">
			<input type="Text" class="form-control" name="id" readonly="readonly" value=<?php echo $arr[$i]['idadmin']?>>
			</div>
			<div class="col-sm-2">
			<input type="Text" class="form-control" name="mail" placeholder= "Mail" value=<?php echo $arr[$i]['mail']?>>
			</div>
			<div class="col-sm-2">
			<input type="Text" class="form-control" name="password"  placeholder= "Password" value=<?php echo $arr[$i]['password']?>>
			</div>
			<div class="col-sm-2">
			<input type="Submit" name="enviar1" class="btn btn-sm btn-primary" value="Modificar">
			</div>
		</div>
		</form>
	
<?php
	}
	$con->desconectar();
?>
	</body>
</html>
