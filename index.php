
	
<form enctype='multipart/form-data' action='' method='post'>
		
<label>Upload Product CSV file Here</label>
 
<input size='50' type='file' name='filename'>
</br>
<input type='submit' name='submit' value='Upload Products' >
 
</form>
<?php
$filename = "";
if (isset($_POST['submit'])) 
{
    $row =[];
    $filename = basename($_FILES['filename']['name'],".csv");
    $file = fopen($_FILES['filename']['tmp_name'], "r");
    while (($row = fgetcsv($file)) !== false) {
        $rows[] = $row;
    }
    fclose($file);
    $headers = array_shift($rows);
    $array = [];
    foreach ($rows as $row) {
        $array[] = array_combine($headers, $row);
    }
    $json = json_encode($array,JSON_PRETTY_PRINT);
    file_put_contents($filename.'.json',$json);

    }
?>
<?php if($filename !== ""){
    ?>
    <p>Télécharge ici le nouveau fichier en json <a href="./<?= $filename ?>.json" download="./<?= $filename ?>.json"><?= $filename ?>.json</a></p>

    <?php
}?>
