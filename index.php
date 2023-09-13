<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <title>Banque</title>
</head>
<body>


<h2>Banque</h2>

<?php

spl_autoload_register(function ($class_name) {
    require $class_name . ".php";
});



// ^ ACCOUNT HOLDER :
$accountHolder01 = new AccountHolder ('Marie', 'Dupont', '1954-04-15', 'Lyon');
$accountHolder02 = new AccountHolder ('Paul', 'Martin', '1987-02-21', 'Strasbourg');



// ^ BANK ACCOUNT :
$bankAccount01 = new BankAccount ('Livret A', 1500, '€', $accountHolder01);
$bankAccount02 = new BankAccount ('Epargne', 2100, '€', $accountHolder01);

$bankAccount03 = new BankAccount ('Livret A', 500, '€', $accountHolder02);
$bankAccount04 = new BankAccount ('Compte Courant', 900, '€', $accountHolder02);

echo "------------Titulaire/s de compte------------";
echo '<br>';

echo $accountHolder01->displayAccountHolder();
echo '<br>';
echo $accountHolder02->displayAccountHolder();
echo '<br>';

echo "------------Détail Compte bancaire------------";
echo '<br>';
echo $bankAccount01->displayBankAccount();
echo '<br>';
echo $bankAccount02->displayBankAccount();

echo '<br>';
echo "------------Action/s sur le/s compte/s------------";
// credit sur compte01 de 100euros
$bankAccount01->creditAccount(100);
echo $accountHolder01->displayAccountHolder();

echo '<br>';

// débit compte02 de 3000 euros
$bankAccount02->debitAccount(3000);
echo $accountHolder02->displayAccountHolder();

echo '<br>';
echo '<br>';
// transfer 30 euros du compte01 au compte 02 
$bankAccount01->transferTo($bankAccount02, 30);
echo $accountHolder01->displayAccountHolder();
echo '<br>';



?>


    
</body>
</html>