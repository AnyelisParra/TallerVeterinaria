<?php
class usuario{
	public function agregar($nombreusuario,$idusuario, $mail ,$direccion, $telefono,$lin){
		
	  $sql ="INSERT INTO usuarios (nombreusuario, idusuario, mail, direccion, telefono) ".
			"VALUES ('$nombreusuario', '$idusuario', '$mail' ,'$direccion', '$telefono')";
					
	    
		$result = $lin->query($sql);
		return $result;
		
		
	}
	
	
	public function search($id){
		
	}
	
	
	//ok
	public function delete ($idusuario,$lin){
		$sql ="DELETE FROM `usuarios` WHERE `idusuario` = '$idusuario';";
		$result = $lin->prepare($sql);
		$result->execute();
	}
	
	//ok
	public function update($nombreusuario,$idusuario, $mail ,$direccion, $telefono,$lin){
		$sql = "UPDATE `usuarios` SET `nombreusuario` = '$nombreusuario',`mail` = '$mail',`direccion` = '$direccion',`telefono` = '$telefono' WHERE `idusuario` = '$idusuario';";
		$result = $lin->prepare($sql);
		$result->execute();
	}
	//ok
	public function listar($lin){
		$sql = "SELECT * FROM usuarios";
		$result = $lin->query($sql);	
		$arr=array();
		while ($fila = $result->fetch_assoc()){
			$arr[]=$fila;
		}
		return($arr);
	}
}
?>