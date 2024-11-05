<?php
$xml = simplexml_load_file('lennujaamad.xml');

$searchCity = isset($_GET['searchCity']) ? $_GET['searchCity'] : '';

?>

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Lennujaamad</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<h2>Reisid</h2>
<a href="xmlToJson.php">JSON</a>
<form action="index.php">
    <input type="text" name="searchCity" placeholder="Otsi linn" id="search">
</form>
<br>
<table>
    <tr>
        <th>Valjumiskoht</th>
        <th>Saabumiskoht</th>
        <th>Valjumisaeg</th>
        <th>Saabumisaeg</th>
    </tr>
<?php
foreach ($xml->lennujaam as $lennujaam):

    $valjumiskoht = $lennujaam->marsruut->valjumiskoht;

if ($searchCity === "" || strpos($valjumiskoht, $searchCity)  !== false) :
?>
    <tr>
        <td><?php echo $lennujaam->marsruut->valjumiskoht;?></td>
        <td><?php echo $lennujaam->marsruut->saabumiskoht;?></td>
        <td><?php echo $lennujaam->valjumisaeg;?></td>
        <td><?php echo $lennujaam->saabumisaeg;?></td>
    </tr>
<?php endif;
endforeach; ?>
</table>