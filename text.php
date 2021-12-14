<?php
require 'check.php';
require 'conn.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){

// CODE ...... 
$title     = Clean($_POST['title']);
$content    = Clean($_POST['content']);
$image = Clean($_POST['image']);


# Validation ...... 
$errors = [];

if(!validate($title,1)){
    $errors['title'] = "Length Must >= 6 chs";
}


if(!validate($content,1)){
    $errors['content'] = "Field Required";
}elseif(!validate($content,2)){
   $errors['content'] = "Length Must >= 20 chs";
}


 if(!validate($image,1)){
    $errors['image'] = "Field Required";
}elseif(!validate($password,3)){
   $errors['image'] = "Field Required";
}



   if(count($errors) > 0){
       foreach ($errors as $key => $value) {
           # code...
           echo '* '.$key.' : '.$value.'<br>';
       }
   }else{



  

    $sql = "insert into users (title,content,image) values ('$title','$content','$image')";
    $op  = mysqli_query($con,$sql);

     if($op){
         echo 'Data Inserted';
     }else{
         echo 'Error Try Again'.mysqli_error($con); 


                            
     }


   }


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
 <title>Register</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
 <h2>Tack6</h2>


 <form  action="<?php echo $_SERVER['PHP_SELF'];?>"   method="post" >

 

 <div class="form-group">
   <label for="exampleInputName">title</label>
   <input type="text" class="form-control" id="exampleInputName"  name="title" aria-describedby="" placeholder="Enter title">
 </div>


 <div class="form-group">
   <label for="exampleInputcontent">content</label>
   <input type="text"   class="form-control" id="exampleInputcontent" name="content" aria-describedby="emailHelp" placeholder="Enter content">
 </div>

 <div class="form-group">
    <label for="exampleInputPassword">Image</label>
    <input type="file"  id="exampleInputPassword1" name="image" >
  </div>

 
 <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>


