<?php
$test=4;
//Para comprobar si se recibe un post desde un ajax
if ($_SERVER['REQUEST_METHOD']==='POST'){
	//Para almacenar los datos JSON recibidos en una variable
	$request= file_get_contents ('php://input');
	//Para convertir un Json en un array de php
	$datos= json_decode($request,true);
	$valores="'";
	$campos="";
	foreach ($datos as $key => $value){
		$campos.= $value['name'].',';
		$valores.= $value['value']."','";

	}

echo json_encode([
	"campos" => $campos,
	"error" => 0,
	"valores" => $valores
	]);
}

else {
echo json_encode([
	"campos" => $campos,
	"error" => 1,
	"valores" => $valores
	]);
}
?>