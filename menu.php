<?php
if(!isset($_SESSION['Reg'])||$_SESSION['Reg']!='ok')header('Location: login.php');
?>	
<head>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<style rel="stylesheet">
	.table{
		width:50%;
		text-align:center;
		margin:0 auto;
	}
	</style>
</head>
<header>


<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	  <a class="navbar-brand" href="index.php">Veterinaria</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarColor01">
		<ul class="navbar-nav mr-auto">
		  <li class="nav-item ">
			<a class="nav-link"  href="index.php?a=adm">Administradores</a>
		  </li>
		  <li class="nav-item active">
			<a class="nav-link" href="index.php?a=usu">Usuarios<span class="sr-only">(current)</span></a>
		  </li>
		  <li class="nav-item active">
			<a class="nav-link" href="index.php?a=mas">Mascotas<span class="sr-only">(current)</span></a>
		  </li>
		  
		</ul>
		
	    <form class="form-inline my-2 my-lg-0">
    
	  <a href="index.php?b=del" class="btn btn-secondary my-2 my-sm-0">Regresar al Login de Sesión</a>
      
    </form>
	  </div>
	</nav>
	
</header>