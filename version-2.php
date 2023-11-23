<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convertisseur</title>
    <link rel="stylesheet" href="./styles.css">
</head>

<body>
    <form enctype='multipart/form-data' action='' method='post'>

        <label>Sélectionner votre fichier CSV ou XML</label>

        <input size='50' type='file' name='filename'>
        </br>
        <input type='submit' name='submit' value='Upload Products'> 
    </form>
</body>

</html>
<?php
require_once('conversion.php');
if (isset($_POST['submit'])) {
    $convert = new conversion($_FILES['filename']);
    if ($convert->filename !== "") {
?>
        <p>Télécharge ici le nouveau fichier en json <a href="./FileConvert/<?= $convert->filename ?>.json" download="./<?= $convert->filename ?>.json"><?= $convert->filename ?>.json</a></p>

<?php
    }
}

?>