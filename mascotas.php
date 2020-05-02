<?php
class mascotas{
	public function agregar($nombremascota,$raza, $cedulausu ,$lin){
	
	    $sql ="INSERT INTO mascota (mascota, raza, idusuario) ".
			  "VALUES ('$nombremascota', '$raza', '$cedulausu')";
					
		$result = $lin->query($sql);
		return $result;
		
		
	}
	
	
	public function search($id){
		
	}
	
	
	//ok
	public function delete ($mail,$lin){
		$sql ="DELETE FROM administrador WHERE mail = '$mail'";
		$result = $lin->prepare($sql);
		$result->execute();
	}
	
	//ok
	public function update($mail,$nombre,$edad,$lin){
		$sql = "UPDATE administrador SET nombre = '$nombre', edad='$edad'".
			   "WHERE 	mail='$mail'";
		$result = $lin->prepare($sql);
		$result->execute();
	}
	//ok
	public function listar($lin){
		$sql = "SELECT * FROM mascota INNER JOIN usuarios ON mascota.`idusuario` = usuarios.`idusuario`";
		$result = $lin->query($sql);	
		$arr=array();
		while ($fila = $result->fetch_assoc()){
			$arr[]=$fila;
		}
		return($arr);
	}
	
	public function listarpropietario($cedulausu,$lin){
		$sql = "SELECT * FROM mascota INNER JOIN usuarios ON mascota.`idusuario` = usuarios.`idusuario` WHERE mascota.`idusuario` = '$cedulausu'";
		$result = $lin->query($sql);	
		$arr=array();
		while ($fila = $result->fetch_assoc()){
			$arr[]=$fila;
		}
		return($arr);
	}
}
?>