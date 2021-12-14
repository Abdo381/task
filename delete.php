
   
<?php 
require '../dbConnection.php';
require '../helpers.php';

$id = $_GET['id'];


if(!validate($id,4)){
    $message =  'Invalid Number';
}else{

   $sql = "select * from users where id = $id";
   $op   = mysqli_query($con,$sql);

     if(mysqli_num_rows($op) == 1){
   
 

   $sql = "delete from users where id = $id ";
   $op  = mysqli_query($con,$sql);


   if($op){
    $message = 'raw deleted';
   }else{
    $message = 'error Try Again !!!!!! ';
   }
}else{
    $message = 'Error In User Id ';
}

}

   $_SESSION['Message'] = $message;

   header("Location: index.php");


?>
