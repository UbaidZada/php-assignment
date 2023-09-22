<?php  include("connection.php"); ?>

<?php

$sqlinsert   = "SELECT * FROM `product`";
 
$insertPrepare = $connection->prepare($sqlinsert);

$insertPrepare->execute();

$productdata = $insertPrepare->fetchAll(PDO::FETCH_ASSOC);

// echo "<pre>";

// print_r($productdata );

// echo "</pre>";


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product view</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</head>
<body>
    <h1 class="text-center my-5" >Product Page</h1>
<div class="container">

<div class="row gap-5">
<?php

foreach($productdata as $data){

?>

<div class="card" style="width: 18rem">

<div class="card-body">

<h5 class = "card-title"><?php echo $data['product_name']?></h5>
<h6 class = "card-substitle mb-2 text-muted"><?php echo $data['product_desc']?></h6>
<p class = "card-text"><?php echo $data['product_price']?></p>
<a href="update.php?id=<?php echo $data['product_id'] ?>" class = "card-lint btn btn-primary">Update</a>
<a href="delete.php?delid=<?php echo $data['product_id'] ?>" value = "delete" name = "delete" class = "card-lint btn btn-danger">Delete</a>

</div>
</div>
<?php

}

?>

</div>


</div>

</body>
</html>

