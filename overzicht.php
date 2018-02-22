<?php

// de data uit de winkelwagen hier:
$winkelwagen = array(
    array('id'=>0,'naam'=>'computer','prijs'=>799.99,'merk'=>'Acer'),
    array('id'=>1,'naam'=>'muis','prijs'=>19.99,'merk'=>'Logitech'),
    array('id'=>2,'naam'=>'toetsenbord','prijs'=>79,'merk'=>'Logitech'),
    array('id'=>3,'naam'=>'beelscherm','prijs'=>279.99,'merk'=>'Samsung')
);

function createtable($data) {
    // de berekening van de totaalprijs:
    $total = array_sum(array_column($data, 'prijs'));
    // start de tabel
    global $tabel;
    $tabel = '<div class="table">';
    array_walk($data,function($item,$key) {
        global $tabel;
        $tabel .= '<div class="row">';
        $tabel .= '<div class="cell">' . $item['naam'] . '</div>';
        $tabel .= '<div class="cell">' . $item['prijs'] . '</div>';
        $tabel .= '</div>';
        });
    // de prijs eronder
    $tabel .= '<div class="row">';
    $tabel .= '<div class="cell vet">Totaal</div>';
    $tabel .= '<div class="cell vet">' . $total . '</div>';
    $tabel .= '</div>';
    // afsluiten tabel
    $tabel .= '</div>';

    // de totale HTML van de tabel als resultaat:
    return $tabel;
}

?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Winkelwagen</title>
</head>

<style>
    .vet {font-weight: bold;}
    .table {
        display:table;
        border-collapse: collapse;
    }
    .row { display:table-row;}
    .cell {display:table-cell;
        border:1px solid black;
        padding: 5px;
    }

</style>
<body>
    <h3>Uw winkelwagen:</h3>
    <?php echo createtable($winkelwagen); ?>
</body>
</html>