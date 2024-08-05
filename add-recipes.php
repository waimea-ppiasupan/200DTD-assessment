<?php
require '_functions.php';
include 'partials/top.php'; 
?>

<h1> Cooking recipes database</h1>
<link rel="stylesheet" href="styles.css">
<link href="cooking-recipes.php">

<?php

consolelog($_POST, 'POST Data');
$code = strtoupper($_POST['code']);//force to upper case for strtrouupper
$name = $_POST['name'];
$website = $_POST['website'];
echo ' code: ' . $code;
echo ' name: ' . $name;
echo ' website: ' . $website;

$db = connectToDB();

$query = 'INSERT INTO iframe (iframe, notes, description) VALUES (?,?,?)';


      //setup a query to get all company info
$query = 'SELECT * FROM company';
//attempt to run the query
try {
    $stmt = $db ->prepare($query);
    $stmt ->execute([$code,$name,$website]);
}
catch (PDOException $e) {
    consolelog($e->getMessage(), 'DB list fecth', ERROR);
    die('There was an error getting data from the database');

}
echo '<p>success!!!</p>';
//see what we got back


          include 'partials/bottom.php';
?>
