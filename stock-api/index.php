<?php

require_once 'vendor/autoload.php';

$config = Finnhub\Configuration::getDefaultConfiguration()->setApiKey('token', 'c8321miad3ie4lt0bpng');
$client = new Finnhub\Api\DefaultApi(
    new GuzzleHttp\Client(),
    $config
);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title></title>
</head>
<body>

<div id="layout">
    <div class="box1">
        <?php
        echo 'Stock name: ' . $client->companyProfile2("AAPL")->getTicker();
        echo '</br>';
        echo 'Stock price: ' . $client->quote("AAPL")->getC();
        echo '</br>';
        echo 'Change: ' . $client->quote("AAPL")->getDp() . '% (' . $client->quote("AAPL")->getD() . ')';
        echo '</br>';
        ?>
    </div>
    
    <div class="box2">
        <?php
        echo 'Stock name: ' . $client->companyProfile2("MSFT")->getTicker();
        echo '</br>';
        echo 'Stock price: ' . $client->quote("MSFT")->getC();
        echo '</br>';
        echo 'Change: ' . $client->quote("MSFT")->getDp() . '% (' . $client->quote("MSFT")->getD() . ')';
        echo '</br>';
        ?>
    </div>

    <div class="box3">
        <?php
        echo 'Stock name: ' . $client->companyProfile2("AMZN")->getTicker();
        echo '</br>';
        echo 'Stock price: ' . $client->quote("AMZN")->getC();
        echo '</br>';
        echo 'Change: ' . $client->quote("AMZN")->getDp() . '% (' . $client->quote("AMZN")->getD() . ')';
        echo '</br>';
        ?>
    </div>

    <div class="box4">
        <?php
        echo 'Stock name: ' . $client->companyProfile2("SYZLF")->getTicker();
        echo '</br>';
        echo 'Stock price: ' . $client->quote("SYZLF")->getC();
        echo '</br>';
        echo 'Change: ' . $client->quote("SYZLF")->getDp() . '% (' . $client->quote("SYZLF")->getD() . ')';
        ?>
    </div>
</div>

<!--<form class="search" method="get" action="/">-->
<!--    <label for="search">Search Stock</label>-->
<!--    <input name="search" value="">-->
<!--    <button type="submit">Search</button>-->
<!--</form>-->

</body>
</html>
