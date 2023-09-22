<?php  include("connection.php");?>

<?php

$sqlview = "SELECT * from uploadimage"; 
$viewprepare = $connection->prepare($sqlview);
$viewprepare->execute();
$data = $viewprepare->fetchALL();


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border = "1">

   <tr>

<th>Name</th>
<th>Image</th>
<th>Button</th>


   </tr>

<?php

foreach($data as $d){

?>

<tr>

<td><?= $d['name']?></td>
<td><img src="image/<?= $d['image']?>" width = "100" alt=""></td>
<td><a href="updateimage.php?id=<?= $d['id']?>">Update</a></td>

</tr>


<?php
}

?>

    </table>
</body>
</html>
