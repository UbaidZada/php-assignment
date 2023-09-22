<?php include('connection.php');?>
<?php



// if(isset($_POST['delete'])){


   $deleteId = $_GET['delid'];

    $sqldelete = "DELETE FROM `product` WHERE product_id = :id";

   $deleteprepare = $connection->prepare($sqldelete);

   $deleteprepare->bindParam(':id',$deleteId,PDO::PARAM_INT);

   $deleteprepare->execute();

   header('location:view.php');



// }

















?>