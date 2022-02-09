<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>C-19 Table</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
$from = $_GET['search'] ?? '';
//$to = $_GET['to'] ?? '';
$offset = $_GET['back'] ?? 0;

$q = json_decode(file_get_contents("https://data.gov.lv/dati/lv/api/3/action/datastore_search?q=$from&resource_id=d499d2f0-b1ea-4ba2-9600-2c701b03bd4a&limit=50"));

$data = [];

foreach ($q as $key => $item) {
//    echo '<pre>';
//    var_dump($key);
//    echo '</pre>';
    $data[$key] = $item;
}
?>

<h1 class="title">Covid Table</h1>

<form class="search" method="get" action="/">
    <label for="search">Search Date</label>
    <input name="search" type="date" id="search">
    <!--    <label for="">To</label>-->
    <!--    <input name="to" type="date" value="">-->
    <button type="submit">Search</button>
</form>

<br>

    <table class="table">
        <tr>
            <th>
                Datums
            </th>
            <th>
                Testu skaits
            </th>
            <th>
                Apstiprināti C19
            </th>
            <th>
                Īpatsvars
            </th>
        </tr>
        <?php foreach ($data['result']->records as $data) { ?>
            <tr>
                <td>
                    <?php echo $data->Datums; ?>
                </td>
                <td>
                    <?php echo $data->TestuSkaits; ?>
                </td>
                <td>
                    <?php echo $data->ApstiprinataCOVID19InfekcijaSkaits; ?>
                </td>
                <td>
                    <?php echo $data->Ipatsvars; ?>
                </td>
            </tr>

        <?php } ?>
    </table>

<form method="get" action="/">
    <?php if($from > 0): ?>
    <button name="back" type="submit">Back</button>
    <?php endif; ?>
</form>

</body>
</html>
