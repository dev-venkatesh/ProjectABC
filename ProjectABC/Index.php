<?php
require 'Autoload.php';
use \ProjectABC\Core\PrimeGenerator;
use \ProjectABC\Core\ConsoleTable;

function drawTable($primeNumbers, $pCount)
{
    $table = new ConsoleTable();
    $table = $table->setHeaders(array_merge(array(" "), $primeNumbers));
    
    foreach ($primeNumbers as $primeNumber)
    {
        $table->addRow()->addColumn($primeNumber);
        for ($index = 0; $index < $pCount; $index++)
        {
            $table->addColumn(($primeNumber * $primeNumbers[$index]));
        }
    }
    
    $table->hideBorder()->display();
}

$pCount       = $argv[2];
$primeNumbers = PrimeGenerator::getPrimeNumbersByCount($pCount);
drawTable($primeNumbers, $pCount);