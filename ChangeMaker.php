<!DOCTYPE html>
<html>
<head>
    <title>Test</title>
</head>
<body>

<form name="value" action="" method="post">
    <p>Valeur a diviser : <input type="text" name="amount">
    <p><input type="submit" name="submit" value="Faire le change"></p>
</form>
<?php
if (isset($_POST['submit'])){

    $money = [50,20,10,5,2,1,0.50,0.20,0.10];

    $amount = $_POST['amount'];

    $banknotes_coins;
    if ($amount >= 0){
        for ($i=0;$i<count($money);$i++){
            $banknotes_coins[$i] = 0;
            //echo($amount." et ".$money[$i]);
            while ($amount >= $money[$i]){
                $banknotes_coins[$i] = $banknotes_coins[$i] +1;
                $amount = $amount - $money[$i];
            }
        }
    }
    echo("<p>Pour diviser ".$_POST['amount']."€ en un minimum de billets/pièces vous aurez besoin :</p>");
    for($i=0;$i<count($money);$i++){
        if($banknotes_coins[$i] > 0){
            if($money[$i] >= 5){
                if($banknotes_coins[$i] > 1){
                    $text = "de ".$banknotes_coins[$i]." billets de ".$money[$i]."€";
                } else {
                    $text = "d'un billet de ".$money[$i]."€";
                }
            } else {
                if($banknotes_coins[$i] > 1){
                    $text = "de ".$banknotes_coins[$i]." pièces de ".$money[$i]."€";
                } else {
                    $text = "d'un pièce de ".$money[$i]."€";
                }
            }
            echo("<p>- ".$text."</p>");
        }
    }

} else {
    echo '<p>Saisissez une valeur a diviser et cliquer sur le bouton</p>';
}
/*
// Autre solution qui divise les cas
function ValueToMinBanknotesCoins($value, $BnC){
    $n = sizeof($BnC);
    for($i = 0; $i < $n; $i++){
        for($j=0; $j<$value+1; $j++){
            $min[$i][$j] = INF;
        }
    }

    for($q = 0; $q < $value+1; $q++){
        if($q % $BnC[0] == 0){
            $min[0][$q] = $q / $BnC[0];
        }
    }
    for($x = 1; $x < $n; $x++){
        for($y = 0; $y < $value+1; $y++){
            $min[$x][$y] = $min[$x-1][$y];
            if($BnC[$x] <= $y){
                if($min[$x][$y - $BnC[$x]]+1 < $min[$x][$y]){
                    $min[$x][$y] = $min[$x][$y - $BnC[$x]]+1;
                }
            }
        }
    }
    for($i = 0; $i < $n; $i++){
        $chosen[$i] = 0;
    }
    $j = $value;
    echo ($j);
    $i = $n - 1;
    while($j!=0){
        if($j >= $BnC[$i]){
            echo('Valeur : '.($min[$i][$j - $BnC[$i]] +1).' et '.$min[$i][$j]);
            if($min[$i][$j - $BnC[$i]] +1 == $min[$i][$j]){
                echo('Je passe ici \n');
                $chosen[$i] += 1;
                $j = $j - $BnC[$i];
                continue;
            } else {
                $i = $i-1;
            }
        }
    }
    return $chosen;
}

$v1 = ValueToMinBanknotesCoins(11,[1,2,5]);
//$v2 = ValueToMinBanknotesCoins(0,[1,2,5]);
//$v3 = ValueToMinBanknotesCoins(20,[1,2,5]);
print_r($v1);
//print_r($v2);
//print_r($v3);*/
?>
</body>
</html>