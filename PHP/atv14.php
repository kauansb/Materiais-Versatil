<?php 
  $number1 = 1; 
  $number2 = 2; 
    
  // Estrutura condicional if
  if ($number2 > $number1) { 
    $a = 'Número 2 é maior que número 1'; 
  } else { 
    $b = 'Número 2 não é maior que número 1'; 
  } 
    
  // Operador ternário
  $ternario = ($number2 > $number1) ? 'Número 2 é maior que número 1' : 'Número 2 não é maior que número 1'; 
    
  // Exibe o resultado do operador ternário
  echo $ternario; // Resultado: Número 2 é maior que número 1
?> 
