<?php
class admin{
	public function agregar($pnombre,$snombre, $papellido ,$sapellido, $id,$mail, $password,$lin){
		
		$sql ="INSERT INTO administrador (pnombreadmin, snombreadmin, papellidoadmin, sapellidoadmin, idadmin, mail, password) ".
					  "VALUES ('$pnombre', '$snombre', '$papellido' ,'$sapellido', '$id','$mail', '$password')";
					
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
	public function update($pnombre,$snombre, $papellido ,$sapellido, $id,$mail, $password, $lin){
		$sql = "UPDATE `administrador` SET `pnombreadmin` = '$pnombre', `snombreadmin` = '$snombre', `papellidoadmin` = '$papellido',`sapellidoadmin` = '$sapellido',`mail` = '$mail',`password` = '$password' WHERE `idadmin` = 'idadmin';";
		$result = $lin->prepare($sql);
		$result->execute();
	}
	//ok
	public function listar($lin){
		$sql = "SELECT * FROM administrador";
		$result = $lin->query($sql);	
		$arr=array();
		while ($fila = $result->fetch_assoc()){
			$arr[]=$fila;
		}
		return($arr);
	}
}
?>