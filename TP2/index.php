<?php
  $t = [[1,2], [3,4,5], [8,9]];
  $titre = ["nom", "prenom", "age"];
  $gens = [
    ["nom"=>"Eastwood", "prenom"=>"Clint", "age"=>"62"],
    ["nom"=>"Gims", "prenom"=>"Maitre"],
    ["nom"=>"O'neil", "age"=>"74"]
        ];

  $aConvertir = ['Je', 'Suis', 'Fromage'];

  function afficher2DArray(array $tab){
    if(isset($tab[1][0])){
      echo "<table border='1'>";
          foreach ($tab as $row) {
            echo "<tr>";
            foreach ($row as $cell) {
              echo "<td>$cell</td>";
            }
            echo "</tr>";
          }
      echo "</table>";
    }else{
      echo "Erreur, tableau a 1 dim";
      exit();
    }
}

function afficher2Array(array $titre, array $contenu){
  echo "<table border='1'>";
  echo "<tr>";
  foreach ($titre as $clef) {
    echo "<td>$clef</td>";
  }
  echo "</tr>";
  foreach ($contenu as $ligne) {
    echo '<tr>';
    foreach ($titre as $key) {
      echo '<td>';
      if(isset($ligne[$key])){
        echo "$ligne[$key]";
      }
      echo '</td>';
    }
    echo '</tr>';
  }
  echo "</table>";
}

function tableau2string($tab, $sep = ';') : string{
  $chaine="";
  if(!isset($sep)){
    $sep = ';';
  }
  foreach ($tab as $val) {
    $chaine.=$val.$sep;
  }
  return $chaine;
}
afficher2DArray($t);
afficher2Array($titre, $gens);
tableau2string($aConvertir);
