<?php
      include 'connect.php';
      $sql = "SELECT * FROM user ORDER BY id DESC";
      $result = $connect->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data Table</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

</head>
<body>
	<br><br>
	<div class="container">
	<h2>Data yang masuk!</h2>
	<br><br>
	<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody id="result">
        <?php
        if ($result->num_rows > 0) {
        	while ($row = $result->fetch_assoc()) {

        ?>
        <tr>
        	<td><?php echo $row['nama']?></td>
        	<td><?php echo $row['email']?></td>
        	<td><?php echo $row['password']?></td>
        </tr>
        <?php
    }
        } else {
        ?>
<tr>
	<td colspan="3">Data Tidak ada.</td>
</tr>

        <?php
    }


        ?>
          
        </tbody>
    </table>
</div>
</body>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


   <script>
  
   let permission = Notification.permission;
if(permission === "granted") {
   showNotification();
} else if(permission === "default"){
   requestAndShowPermission();
} else {
  alert("Use normal alert");
}
function showNotification() {
   if(document.visibilityState === "visible") {
       return;
   }
   var title = "Data added";
   icon = ""
   var body = "Data added Successfuly";
   var notification = new Notification('Data added', { body, icon });
   notification.onclick = () => { 
          notification.close();
          window.parent.focus();
   }
}
function requestAndShowPermission() {
   Notification.requestPermission(function (permission) {
      if (permission === "granted") {
            showNotification();
      }
   });
}

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('5a4b18d34af84ebd397f', {
      cluster: 'ap1'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      // alert("new data has been added!");
     showNotification();
  $.ajax({url: "data.php", success: function(result){
    $("#result").html(result);
  }});
});
	

  </script>
</html>