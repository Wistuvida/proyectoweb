<?php
$error;
if (!empty($_POST['usuario'])and! empty($_POST['clave'])){
    $usuario=$_POST['usuario'];
    $clave=$_POST['clave'];
  require_once"conexion.php";
  $query=mysqli_query($conection, "SELECT * FROM Login WHERE USUARIO='$usuario' AND CLAVE='$clave'");
  $result=mysqli_num_rows($query);

  if ($result>0) {
      $data=mysqli_fetch_array($query);
      $error="ok";
      header("location:menu.php");
  }else{
  	$error="incorrecto";
  	header("location:Login.php?error=$error");
  }
}else{
	$error="vacio";
	  header("location:Login.php?error=$error");
}
?>
