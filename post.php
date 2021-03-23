<?php 

include 'connect.php';
 require __DIR__ . '/vendor/autoload.php';

if (isset($_POST['done'])) {

 
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$sql = "INSERT INTO user(`nama`,`email`,`password`) VALUES ('$nama','$email','$password') ";
	// $query =  mysqli_query($connect,$sql);
  $options = array(
    'cluster' => 'ap1',
    'useTLS' => true
  );
  $pusher = new Pusher\Pusher(
    '5a4b18d34af84ebd397f',
    '07e10364108de780bfcf',
    '1176416',
    $options
  );

	if ($connect->query($sql)) {
		 $data['message'] = $nama;
  $pusher->trigger('my-channel', 'my-event', $data);
  	// header('location:insert.php'); 
	}else{
		echo "Error : ".$sql."<br>".$connect->error;
	}
	$connect->close();
}
?>
