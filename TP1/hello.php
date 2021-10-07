<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP php</title>
</head>
<body>
    <h4>Coucou</h4>
    <?php echo "coucou" ?>
    <h4>Somme jusqu'a n=5</h4>
    <?php
        $n = 5;
        $varibable = 10;
        $x=0; //1 +2 +3 +4 +5 = 15
        for ($i=0; $i <= $n; $i++) { 
            $x+=$i;
        }
        echo "$x";
    ?>
    <h4>Afficher la date</h4>
    <?php 
        setlocale(LC_ALL, "fr_FR");
        date_default_timezone_set("Europe/Brussels");
        $dayOfTheYear = date("z");
        echo "Bonjour! nous sommes le: ".strftime("%A/%B/%g")."</br>Demain nous serons le: ".date("d/m/y", mktime(0,0,0,date("m"), date("d")+1, date("y")));
        echo "</br>Nous sommes le {$dayOfTheYear} jour de l'annee";
    ?>
</body>
</html>