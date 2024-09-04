<?php 
  $number1 = array(100, 101, 102); 
  $number1[] = 103; 
  $number2[] = 104; 
  
  print_r($number1);   
  echo '<hr/>';   
  print_r($number2);
?>
 
<?php
  $cert = array('EAD' => 'Você terá um certificado ', 'PHP' => 'Linux'); 
    
  $cert['PHP'] = 'Zend';  
  echo '<hr/>';
  print_r($cert); 

?> 
