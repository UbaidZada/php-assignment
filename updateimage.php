<?php         

include("connection.php");

@$id = $_GET['id'];

$sqlview = "SELECT * from uploadimage WHERE id = '$id'"; 
$viewprepare = $connection->prepare($sqlview);
$viewprepare->execute();
$data = $viewprepare->fetch();

if(isset($_POST['submit'])){

$productname = $_POST['productname'];

$image = $_FILES['image'];
$imagename = $_FILES['image']['name'];
$imageTempname = $_FILES['image']['tmp_name'];
$imagesize = $_FILES['image']['size'];

echo "<br>$imagename<br>";
echo "<br>$imageTempname<br>";
echo "<br>$imagesize<br>";

echo "<pre>";

print_r($image);

echo "</pre>";


$imageextension = explode(".",$imagename);

print_r($imageextension );

$imageextension = strtolower(end($imageextension));

echo "<br>$imageextension<br>";

$uniquename = uniqid();

$uniquename .= ".".$imageextension;

echo "$uniquename";


if($imagesize > 5000000){

 echo "<script>alert('image size is large')</script>";


}else{

    
    $imageinsertsql = "UPDATE `uploadimage` SET `name`= :name,`image`= :image  WHERE id = :id ";
    
    $imageprepare = $connection->prepare($imageinsertsql);
    
    $imageprepare->bindParam(':name',$productname,PDO::PARAM_STR);
    $imageprepare->bindParam(':image',$uniquename,PDO::PARAM_STR);
    $imageprepare->bindParam(':id',$id,PDO::PARAM_INT);

    $imageprepare->execute();

    unlink("image/".$data['image']);
    move_uploaded_file($imageTempname,"image/".$uniquename);

}
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Images Upload</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method = "post" enctype = "multipart/form-data">

<label for="">Product Name</label>
<input type="text" name = "productname" value="<?= $data['name'] ?>">

<label for="">Upload Image</label>
<input type="file" name = "image" accept = "image/png , image/jpg , image/jpeg">

<input type="submit" name = "submit" value = "Upload Image">

    </form>
</body>
</html>