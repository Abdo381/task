<?php 

require 'check.php';
require 'conn.php';


   $id = $_GET['id'];

   $sql = "select * from users where id = $id";
   $op   = mysqli_query($con,$sql);

     if(mysqli_num_rows($op) == 1){

        $data = mysqli_fetch_assoc($op);
     }else{

        $_SESSION['Message'] = "Access Denied";
        header("Location: index.php");
     }






if($_SERVER['REQUEST_METHOD'] == "POST"){


$name     = Clean($_POST['name']);
$email    = Clean($_POST['email']);

$errors = [];

if(!validate($titel,1)){
    $errors['titel'] = "Field Required";
}


if(!validate($content,1)){
    $errors['content'] = "Field Required";
}elseif(!validate($content,2)){
   $errors['content'] = "Invalid content Format";
}

if(!validate($image,1)){
    $errors['image'] = "Field Required";
}elseif(!validate($image,3)){
   $errors['image'] = "Invalid image Format";
}



   if(count($errors) > 0){
       foreach ($errors as $key => $value) {
           # code...
           echo '* '.$key.' : '.$value.'<br>';
       }
   }else{

    // db .......... 


     $sql = "update users set name = '$name' , email = '$email' where id = $id";
     $op  = mysqli_query($con,$sql);

     if($op){
       $message =  'Data Updated';
     }else{
       $message =  'Error Try Again'.mysqli_error($con); 


                            
     }


   }

        $_SESSION['Message'] = $message;
        header("Location: index.php");


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
 <title>Edit</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
 <h2>Edit Account</h2>


 <form  action="edit.php?id=<?php echo $data['id'];?>"   method="post" >

 

 <div class="form-group">
   <label for="exampleInputName">Name</label>
   <input type="text" class="form-control" id="exampleInputName"  name="name"  value="<?php echo $data['name'];?>" aria-describedby="" placeholder="Enter Name">
 </div>


 <div class="form-group">
   <label for="exampleInputEmail">Email address</label>
   <input type="email"   class="form-control" id="exampleInputEmail1" name="email" value="<?php echo $data['email'];?>"  aria-describedby="emailHelp" placeholder="Enter email">
 </div>


 
 <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>

</body>
</html>
