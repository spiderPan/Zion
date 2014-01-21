<?php
    #echo var_export($_POST);
    while(list($key,$value) = each($_POST)){
        #echo $key;
        $$key = $value;
        
    }
   
    
    $to='panbanglanfeng@gmail.com';
    
   
    $subj = 'quick msg from '.$uName;
    $headers  = "From: $uEmail.\r\n";  
    $headers .= "Reply-To: $uEmail\r\n";
    $uMsg .="\r\n".$headers;
      if($uEmail == 'jbrunner@fanshaweonline.ca'){
        $to .= ', jbrunner@fanshaweonline.ca';
        $uMsg .="\r\n Hi Justing, I am so glad to get your testing email. \r\n All these information will only be available when you typed jbrunner@fanshaweonline.ca as your email address. So this email will
        send back to your email and also copy to my email. Hopefully both we can get the feedback, which means my server works well!";
    }
    
    
    
    if(mail($to,$subj,$uMsg,$headers)){
    $thanksURL = "thankyou.php?uName=".$uName;
    #echo $uName;
    #echo phpinfo();
    header("Location:".$thanksURL);
    }else{
        echo "FAIL!!!";
        echo "to:\t".$to."<br> Subject is:\t".$subj."<br> uMsg is: \t".$uMsg ."<br>".$headers."<br>";
        echo phpinfo();
    }
?>