<?php 
  // Inicializa a variável $var com um valor inteiro
  $var = 100; 

  // Conversão de tipo para booleano
  $type_casting = (bool) $var; 
  // Exibe o resultado da conversão para booleano (1 para verdadeiro)
  echo "Booleano: " . ($type_casting ? 'true' : 'false') . "<br>"; 

  // Conversão de tipo para inteiro
  $type_casting = (int) $var; 
  // Exibe o resultado da conversão para inteiro
  echo "Inteiro: " . $type_casting . "<br>"; 

  // Conversão de tipo para float
  $type_casting = (float) $var; 
  // Exibe o resultado da conversão para float
  echo "Float: " . $type_casting . "<br>"; 

  // Conversão de tipo para string
  $type_casting = (string) $var; 
  // Exibe o resultado da conversão para string
  echo "String: " . $type_casting . "<br>"; 

  // Conversão de tipo para array
  $type_casting = (array) $var; 
  // Exibe o resultado da conversão para array
  echo "Array: ";
  print_r($type_casting); 
  echo "<br>"; 
?>
