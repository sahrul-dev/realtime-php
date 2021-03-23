<?php
include 'connect.php';

      include 'connect.php';
      $sql = "SELECT * FROM user ORDER BY id DESC";
      $result = $connect->query($sql);
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