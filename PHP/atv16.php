<?php 
  $ensino = 'EAD'; 
  $formacao = array(
    'PHP' => 'Desenvolvedor PHP', 
    'Infra' => 'SysAdmin Linux'
  ); 
  
  // Interpolação de variáveis
  echo "<p>No $ensino da Versátil você se torna {$formacao['PHP']}"; 
  echo " e pode se tornar também {$formacao['Infra']}.</p>"; 

  // Concatenação de variáveis
  echo '<p>No ' . $ensino . ' da Versátil você se torna ' . $formacao['PHP']; 
  echo ' e pode se tornar também '. $formacao['Infra'] . '.</p>'; 
  
?> 
