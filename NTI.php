<html> 
     <head> 
  </head>
  <body>
  <table width="800px" height="600px" cellspacing="0px" cellpadding="0px">
      <?php
      /*
      for($row=1;$row<=10;$row++)
	  {
         echo "<tr>";
          for($col=1;$col<=8;$col++)
		  {
          $total=$row+$col;
          if($total%2==0)
		  {
          echo "<td height=30px width=30px bgcolor=#FFFFFF></td>";
          }
		  else
		  {
          echo "<td height=30px width=30px bgcolor=#000000></td>";
          }
          }
       echo "</tr>";
    }*/

    function Message($str,$str2) {
      
       if ($str=="a"&& $str2=="z") {
         echo( $str="b");
         echo( $str2="a");
          
       }
      
       
   }

   Message("a","z");

          ?>

  </table>
  </body>
  </html>