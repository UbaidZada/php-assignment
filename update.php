<?php include("connection.php");?>


<?php

$id = $_GET['id']; 

$sqlfetch = "SELECT * from product WHERE product_id = :id";

$fetchPrepare = $connection->prepare($sqlfetch);
$fetchPrepare->bindParam(':id',$id,PDO::PARAM_INT);
$fetchPrepare->execute();

$data = $fetchPrepare->fetch(PDO::FETCH_ASSOC);

// print_r($data['product_name']);

if(isset($_POST['submit'])){

    $productName = $_POST['productName'];
    $productdesc = $_POST['productdesc'];
    $productprice = $_POST['productprice'];

if(empty($productName) || empty($productdesc) || empty($productprice)){

echo "<script> alert('Please Fill All The Fields ') </script>";

}else{

    $updatequery = "UPDATE `product` SET `product_name`= :productName,
    `product_desc`= :productdesc,`product_price`= :productprice  WHERE product_id = :id";
    
    $updateprepare = $connection->prepare($updatequery);
    
    $updateprepare->bindParam(':productName',$productName,PDO::PARAM_STR);
    $updateprepare->bindParam(':productdesc',$productdesc,PDO::PARAM_STR);
    $updateprepare->bindParam(':productprice',$productprice,PDO::PARAM_INT);
    $updateprepare->bindParam(':id',$id,PDO::PARAM_INT);
    
    $updateprepare->execute();

    header("location:view.php");

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
    <h1 class="text-center my-5" >Update Products</h1>
<div class="container">
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method = "post" class = "form-group">

<label for=""> Product Name</label>
<input type="text" value = "<?php echo $data['product_name'] ?>" name = "productName" id = "" class = "form-control"> <br>

<label for=""> Product Desc</label>
<input type="text" value = "<?php echo $data['product_desc'] ?>" name = "productdesc" id = "" class = "form-control"> <br>

<label for=""> Product Price</label>
<input type="text" value = "<?php echo $data['product_price'] ?>" name = "productprice" id = "" class = "form-control"> <br>
<!-- 
<label for=""> ProductDate </label>
<input type="text" name = "productdate" id = "" class = "form-control"> <br> -->

<input class = " btn btn-success" type="submit" name = "submit" value = "Update Product">

    </form>
</div>

</body>
</html>

