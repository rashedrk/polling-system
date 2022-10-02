<?php 

function getData($votefor){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database_name = "online_polling";
    $conn = mysqli_connect($servername,$username,$password,$database_name);
    if (!$conn) {
        die("Connection failed: ".mysqli_connect_error());
    }
    $sql = "SELECT * from vote Where food='$votefor'";
    if ($result = mysqli_query($conn, $sql)) {
    $row = mysqli_num_rows( $result );
}
    return $row;
}

$Panta_Ilish=getData("Panta Ilish");
$Kacchi_Biryani=getData("Kacchi Biryani");
$Morog_Polao=getData("Morog Polao");
$Seekh_Kebab=getData("Seekh Kebab");
$Grill_Chicken_With_Naan_Roti=getData("Grill Chicken With Naan Roti");

$total_votes=$Panta_Ilish+$Kacchi_Biryani+$Morog_Polao+$Seekh_Kebab+$Grill_Chicken_With_Naan_Roti;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote Here</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container d-flex justify-content-center">
        <div class="box mt-5 p-4">
            <h3 class="text-center mb-3">RESULT</h3> 
            <h4 class="mb-4">Total Votes: <?=$total_votes?></h4>
            <div class="result mb-4">
                <h5>Panta Ilish <span>(<?=$Panta_Ilish?> Votes)</span></h5>
                <div class="result-bar" style="width:<?=@round(($Panta_Ilish/$total_votes)*100)?>%">
                    <?=@round(($Panta_Ilish/$total_votes)*100)?>%
                </div>
            </div>
            <div class="result mb-4">
                <h5>Kacchi Biryani <span>(<?=$Kacchi_Biryani?> Votes)</span></h5>
                <div class="result-bar" style="width:<?=@round(($Kacchi_Biryani/$total_votes)*100)?>%">
                    <?=@round(($Kacchi_Biryani/$total_votes)*100)?>%
                </div>
            </div>
            <div class="result mb-4">
                <h5>Morog Polao <span>(<?=$Morog_Polao?> Votes)</span></h5>
                <div class="result-bar" style="width:<?=@round(($Morog_Polao/$total_votes)*100)?>%">
                    <?=@round(($Morog_Polao/$total_votes)*100)?>%
                </div>
            </div>
            <div class="result mb-4">
                <h5>Seekh Kebab  <span>(<?=$Seekh_Kebab?> Votes)</span></h5>
                <div class="result-bar" style="width:<?=@round(($Seekh_Kebab/$total_votes)*100)?>%">
                    <?=@round(($Seekh_Kebab/$total_votes)*100)?>%
                </div>
            </div>
            <div class="result">
                <h5>Grill Chicken With Naan Roti <span>(<?=$Grill_Chicken_With_Naan_Roti?> Votes)</span></h5>
                <div class="result-bar" style="width:<?=@round(($Grill_Chicken_With_Naan_Roti/$total_votes)*100)?>%">
                    <?=@round(($Grill_Chicken_With_Naan_Roti/$total_votes)*100)?>%
                </div>
            </div>
        </div>
    </div>
</body>
</html>