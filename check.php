<?php 


function Clean($input){

     return   strip_tags(trim($input));
}



function validate($input,$flag){

     $status = true;
    switch ($flag) {
        case 1:
              if(empty($input)<6){
                  $status = false;
              }
            break;
        
        case 2: 
            if(strlen($input) < 20){
                $status = false; 
            }
            break;


        case 3:
        if(strlen($input) ){
            $status = false; 
        }
              
        break;
   case 4: 
        # code ... 
        if(!filter_var($input,FILTER_VALIDATE_INT)){
            $status = false;
        }
        break;

       
     


    }

    return $status ; 
}
?>
