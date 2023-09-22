
<?php include('connection.php');?>



<?php
if(isset($_POST['submit'])){

$productName = $_POST['productName'];
$productdesc = $_POST['productdesc'];
$productprice = $_POST['productprice'];
// @$productDate = $_POST['productDate'];

if(empty($productName) || empty($productdesc) ||empty($productprice)){

echo "<script> alert ('Please field all the field')</script>";

}else{

$sqlinsert = "INSERT INTO `product` (`product_name`, `product_desc`, `product_price`)
 VALUES (:name,:desc,:price)";

$insertPrepare = $connection->prepare($sqlinsert);

$insertPrepare->bindParam(':name',$productName,PDO::PARAM_STR);
$insertPrepare->bindParam(':desc',$productdesc,PDO::PARAM_STR);
$insertPrepare->bindParam(':price',$productprice,PDO::PARAM_INT);
// $insertPrepare->bindValue('1',$productName,PDO::PARAM_STR);
// $insertPrepare->bindValue('2',$productdesc,PDO::PARAM_STR);
// $insertPrepare->bindValue('3',$productprice,PDO::PARAM_INT);

$insertPrepare->execute();


}





}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</head>
<body>
    <h1 class="text-center my-5" >ADD Product</h1>
<div class="container">
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method = "post" class = "form-group">

<label for=""> Product Name</label>
<input type="text" name = "productName" id = "" class = "form-control"> <br>

<label for=""> Product Desc</label>
<input type="text" name = "productdesc" id = "" class = "form-control"> <br>

<label for=""> Product Price</label>
<input type="text" name = "productprice" id = "" class = "form-control"> <br>
<!-- 
<label for=""> ProductDate </label>
<input type="text" name = "productdate" id = "" class = "form-control"> <br> -->

<input class = " btn btn-success" type="submit" name = "submit" value = "Add Product">

    </form>
</div>

</body>
</html>








