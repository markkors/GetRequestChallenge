<?php

// de data uit de winkelwagen hier:
$winkelwagen = array(
    array('id'=>0,'naam'=>'computer','prijs'=>799.99,'merk'=>'Acer'),
    array('id'=>1,'naam'=>'muis','prijs'=>19.99,'merk'=>'Logitech'),
    array('id'=>2,'naam'=>'toetsenbord','prijs'=>79,'merk'=>'Logitech'),
    array('id'=>3,'naam'=>'beelscherm','prijs'=>279.99,'merk'=>'Samsung')
);

// controleer de binnenkomende get querystring
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    // zoek naar het ID in de winkelwagen data
    foreach ($winkelwagen as $item) {
        if ($item['id'] == $id) {
            $selected = $item;
            break;
        }
    }
} else {
    $id=-1;
}

function createdetail($data) {
    $tabel = '<div class="table">';
    $tabel .= '<div class="row">';
    $tabel .= '<div class="cell">' . $data['id'] . '</div>';
    $tabel .= '<div class="cell">' . $data['naam'] . '</div>';
    $tabel .= '<div class="cell">' . $data['prijs'] . '</div>';
    $tabel .= '<div class="cell">' . $data['merk'] . '</div>';
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
    <title>Winkelwagen detail</title>
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
<h3>Detail:</h3>
<?php
    echo ($id > -1 && isset($selected)) ? createdetail($selected) : '<h3>no data found</h3>';
?>
<button onclick="history.back();">Terug</button>
</body>
</html>
