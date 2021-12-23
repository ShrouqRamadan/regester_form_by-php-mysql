<?php
function sms($var,$mass){
    if($var){
        echo "<div class='alert alert-success  alert3 text-center mt-5 style='width:50% ' role='alert'>
        <h5 >$mass true </h5>
        
        </div>";
    }else{
        echo "<div class='alert alert-danger  alert3 text-center mt-5 style='width:50% ' role='alert'>
        <h5 >$mass False</h5>
      
        </div>";
    }
};




?>
