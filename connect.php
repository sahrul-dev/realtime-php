<?php 

$host = 'localhost';
$username = 'root';
$pass = '';
$database = 'crudnative';

$connect = mysqli_connect($host,$username,$pass);
mysqli_select_db($connect,$database);

// header("Content-type:application/json");

// if($connect->connect_error){
//     $data = array("status"=>"ERROR","pesan"=>$connect->connect_error);
//     echo json_encode($data);
//     exit();
// }else{
//     $data = array(
//         "status"=>"OK",
//         "pesan"=>"Berhasil"
//         );
//     echo json_encode($data);
// }

 ?>