<?php
if(!isset($_SESSION['Reg'])||$_SESSION['Reg']!='ok')header('Location: login.php');
?>



<?php
//Importación de Clases
    require_once("conexion.php");
	require_once("mascotas.php");
	require_once("usuario.php");
	
	$con = new conexion();
	$mascota = new mascotas();
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
	<h2> Gestión de Mascotas &raquo; Añadir Mascota</h2>
	<hr />

<form class="form-horizontal" action="" method="post">
				<div class="row">
					<label class="col-sm-3 control-label"> Nombre Mascota</label>
					<div class="col-sm-2">
						<input type="text" name="mascota" class="form-control" placeholder="Nombre de Mascota" required>
					</div>
				</div>
				<div class="row">
					<label class="col-sm-3 control-label">Raza</label>
					<div class="col-sm-2">
						<input type="text" name="raza" class="form-control" placeholder="Raza Mascota" required>
					</div>
				</div>
				<div class="row">
					<label class="col-sm-3 control-label">Nombre Dueño de la Mascota</label>
					<div class="col-sm-4">
					    <select name="usuario" class="form-control" >
						<?php
                            $arr=$usuario->listar($con->conectar());
							for($i=0;$i<count($arr);$i++){
							echo '<option value='.$arr[$i]['idusuario'].'>'.$arr[$i]['nombreusuario'].'</option>';
							}
							//session_destroy();
						?>
					  </select>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6">
						<input type="submit" name="AgregarMascota" class="btn btn-sm btn-success" value="Agregar Mascota">
					</div>
			
				</div>
			</form>
		</div>
	</div>

  

<?php
	if(isset($_POST['AgregarMascota'])){

			$nombremascota = $_POST['mascota'];
		    $raza	= $_POST['raza'];
		    $cedulausu	= $_POST['usuario'];
			$result=$mascota->agregar($nombremascota,$raza,$cedulausu,$con->conectar());

			if($result==true){
				
				echo"Mascota Creada Exitosamente";
			}else{
				echo"Error al crear Mascota ";
			}
		
	
    }
?>
<table border="0" style="width:100%;">
<tr>
<td>
<h4 style="text-align:center;" >Listado de todas las mascotas.</h4>
<table>
<?php
$arr=$mascota->listar($con->conectar());
echo "<table class='table table-hover'>";
	for($i=0;$i<count($arr);$i++){

            echo"<tr>";
			echo "<td>";
				 echo $arr[$i]['mascota'],"  ";
			echo "</td>";
			echo "<td>";
				echo $arr[$i]['raza'],"  ";
			echo "</td>";
			echo "<td>";
				 echo $arr[$i]['nombreusuario'],"  ";
			echo "</td>";
			echo "<td>";
				echo $arr[$i]['idmascota'],"  ";
			echo "</td>";
        echo"</tr>";
		
	
?>	
<?php
	}
	$con->desconectar();

?>

</table>	
</td>


<td style="vertical-align: top;">
<h4 style="text-align;" >Filtro por Dueño</h4>
<form action="" method="post">
<!--Etiqueta (nombre de la etiqueta)-->
               <div class="row">
					<label class="col-sm-3 control-label">Filtrar por Dueño</label>
					<div class="col-sm-4">
					    <select name="usuariofiltrar" class="form-control" >
						<?php
                            $arr=$usuario->listar($con->conectar());
							for($i=0;$i<count($arr);$i++){
							echo '<option value='.$arr[$i]['idusuario'].'>'.$arr[$i]['nombreusuario'].'</option>';
							}
							//session_destroy();
						?>
					  </select>

					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<input type="submit" name="FiltrarMascota" class="btn btn-sm btn-primary" value="Filtrar Mascota por Dueño">
					</div>
			
				</div>

   
   <table>
   </form>
</td>   
<?php
if(isset($_POST['FiltrarMascota'])){
$cedulausu	= $_POST['usuariofiltrar'];

echo "cedula consultada: ".$cedulausu;

$arr=$mascota->listarpropietario($cedulausu, $con->conectar());
echo "<table class='table table-hover'>";
if(count($arr) > 0)
{

	for($i=0;$i<count($arr);$i++){

   
		
		   echo"<tr>";
			echo "<td>";
				 echo $arr[$i]['mascota'],"  ";
			echo "</td>";
			echo "<td>";
				echo $arr[$i]['raza'],"  ";
			echo "</td>";
			echo "<td>";
				 echo $arr[$i]['nombreusuario'],"  ";
			echo "</td>";
			echo "<td>";
				echo $arr[$i]['idmascota'],"  ";
			echo "</td>";
        echo"</tr>";
		
?>	
<?php
	}
	
	
}else{
	
		echo "<p>Este Usuario no registra mascota</p>";
}
	$con->desconectar();
}	

?>
	</table>
</td>
</tr>

</table>

</body>
</html>