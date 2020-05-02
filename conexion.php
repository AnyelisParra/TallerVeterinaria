<?php
class conexion{
	
	private $lin;
	
	public function conectar(){
		$this->lin = mysqli_connect("localhost", "root", "", "veterinaria");
		return $this->lin;
	}
	public function desconectar(){
		mysqli_close($this->lin);
	}
	
}
	


?>