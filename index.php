<?php

require_once 'vendor/autoload.php';

use App\CovidLoader;


$statistics=new CovidLoader('https://data.gov.lv/dati/dataset/5d0c9a64-b7b2-494e-b77d-22d48225791b/resource/8ea0ee31-1bea-4336-bbe4-2e66ccdadd1b/download/covid_19_valstu_saslimstibas_raditaji.csv');
$records=$statistics->getRecords();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>COVID-19 Statisika</title>
</head>
<body>
<style>
    #myInput {

        background-position: 10px 10px;
        background-repeat: no-repeat;
        width: 100%;
        font-size: 16px;
        padding: 12px 20px 12px 40px;
        border: 1px solid #ddd;
        margin-bottom: 12px;
    }

   table, th, td {
        border: 1px solid black;
    };

</style>


<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for country.." title="Type in a country">

<div class="container">
<table class="table" id="myTable">
    <tbody>

<div class="title">
        <tr >
            <th>Datums</th>
            <th>Valsts</th>
            <th>14DienuKumulativaIncidence</th>
            <th>Pasizolacija</th>
            <th>PersIrVakcParslSert_PasizolacijaLatvija</th>
            <th>PersIrVakcParslSert_TestsPirmsIebrauksanasLV</th>
            <th>PersIrVakcParslSert_TestsPecIebrauksanasLV</th>
            <th>CitasPersonas_PasizolacijaLatvija</th>
            <th>CitasPersonas_TestsPirmsIebrauksanasLV</th>
            <th>CitasPersonas_TestsPecIebrauksanasLV</th>
        </tr>
</div>
        <?php foreach($records as $record):?>
            <tr>
        <th scope ="row"><?php echo $record['Datums'];?></th>
        <td><?php echo $record['Valsts'];?></td>
        <td><?php echo $record['14DienuKumulativaIncidence'];?></td>
        <td><?php echo $record['Pasizolacija'];?></td>
        <td><?php echo $record['PersIrVakcParslSert_PasizolacijaLatvija'];?></td>
        <td><?php echo $record['PersIrVakcParslSert_TestsPirmsIebrauksanasLV'];?></td>
        <td><?php echo $record['PersIrVakcParslSert_TestsPecIebrauksanasLV'];?></td>
        <td><?php echo $record['CitasPersonas_PasizolacijaLatvija'];?></td>
        <td><?php echo $record['CitasPersonas_TestsPirmsIebrauksanasLV'];?></td>
        <td><?php echo $record['CitasPersonas_TestsPecIebrauksanasLV'];?></td>


        </tr>
    <?php endforeach;?>
    </tbody>

</table>
</div>
<script>
    function myFunction() {
        let input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById(["myTable"]);
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
</body>
</html>
