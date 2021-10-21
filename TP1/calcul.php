<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equation second degree</title>
</head>
<body>
    <form action="calcul.php" method="POST">
        <table>
            <tr>
                <td><label>a</label></td>
                <td><input type="number" name="valA"></td>
            </tr>
            <tr>
                <td><label>b</label></td>
                <td><input type="number" name="valB"></td>
            </tr>
            <tr>
                <td><label>c</label></td>
                <td><input type="number" name="valC"></td>
            </tr>
        </table>
        <input type="submit" value="Resoudre">
    </form>
</body>
</html>

<?php
$a = $_POST['valA'];
$b = $_POST['valB'];
$c = $_POST['valC'];
$delta=0;
$x1=0;
$x2=0;
if($a == NULL){
    $a = 0;
}
if($b == NULL){
    $b = 0;
}
if($c == NULL){
    $c = 0;
}
$delta=($b**2)+(-4*$a*$c);

if($delta==0){
    $x1=(-$b)/(2*$a);
    $x2=$x1;
    echo "la solution double de l'equation $a x^2+$b x+$c est:\n x0=$x1";
}
if($delta>0){
    $x1=(-$b-($delta**(1/2)))/(2*$a);
    $x2=(-$b+($delta**(1/2)))/(2*$a);
    echo "les solution a l'equation $a x^2+$b x+$c sont :\n x1=$x1 \n x2=$x2";
}
else{
    echo "pas de solution reel";
}
