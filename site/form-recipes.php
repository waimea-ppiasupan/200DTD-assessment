<?php
require '_functions.php';
include 'partials/top.php'; 
?>

<h1> </h1>
<link rel="stylesheet" href="styles.css">
<link href="index.php">

<?php

consolelog($_POST, 'POST Data');
$id = strtoupper($_POST['iframe_id']);//force to upper case for strtrouupper
$notes = $_POST['notes'];
$website = $_POST['website'];
echo ' iframe_id: ' . $id;
echo ' notes: ' . $notes;
echo ' website: ' . $website;

$db = connectToDB();

$query = 'INSERT INTO iframe (website, notes, description) VALUES (?,?,?)';


      //setup a query to get all company info
$query = 'SELECT * FROM iframe';
//attempt to run the query
try {
    $stmt = $db ->prepare($query);
    $stmt ->execute([$iframe_id,$notes,$website]);
}
catch (PDOException $e) {
    consolelog($e->getMessage(), 'DB list fecth', ERROR);
    die('There was an error getting data from the database');

}
echo '<p>success!!!</p>';
//see what we got back


          include 'partials/bottom.php';
?>
