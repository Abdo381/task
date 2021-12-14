<?php 

require 'conn.php';

$sql = "select id,titel,content,image from users ";

$op  = mysqli_query($con,$sql);


?>



<!DOCTYPE html>
<html>

<head>
    <title>PDO - Read Records - PHP CRUD Tutorial</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- custom css -->
    <style>
        .m-r-1em {
            margin-right: 1em;
        }

        .m-b-1em {
            margin-bottom: 1em;
        }

        .m-l-1em {
            margin-left: 1em;
        }

        .mt0 {
            margin-top: 0;
        }

    </style>

</head>

<body>

    <!-- container -->
    <div class="container">


        <div class="page-header">
            <h1>Read Users </h1>
            <br>

        </div>





        <?php 
           
            if(isset($_SESSION['Message'])){
                echo $_SESSION['Message'];
                
                unset($_SESSION['Message']);


            }
        
        
        ?>





        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th>ID</th>
                <th>titel</th>
                <th>content</th>
                <th>image</th>
            </tr>

<?php 

while($data = mysqli_fetch_assoc($op)){

?>
    <tr>
       <td><?php echo $data['id'];?></td>
       <td><?php echo $data['titel'];?></td>
       <td><?php echo $data['content'];?></td>
       <td><?php echo $data['image'];?></td>

                <td>
                    <a href='delete.php?id=<?php echo $data['id'];?>' class='btn btn-danger m-r-1em'>Delete</a>
                    <a href='edit.php?id=<?php echo $data['id'];?>' class='btn btn-primary m-r-1em'>Edit</a>

                </td>
            </tr>
<?php 
}
?>

         
        </table>

    </div>
  



    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</body>

</html>