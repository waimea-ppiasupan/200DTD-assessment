<?php
require '_functions.php';
include 'partials/top.php'; 
?>

<h1> </h1>
<link rel="stylesheet" href="styles.css">
<link href="index.php">

<?php

consolelog($_POST, 'POST Data');
$iframe_id = strtoupper($_POST['iframe_id'] ?? '');
$notes = $_POST['notes'] ?? '';
$website = $_POST['website'] ?? '';
echo ' iframe_id: ' . $iframe_id;
echo ' notes: ' . $notes;
echo ' website: ' . $website;

$db = connectToDB();

$insert_query = 'INSERT INTO iframe (website, notes, description) VALUES (?,?,?)';
$select_query = 'SELECT * FROM instructions';

try {
    $stmt = $db->prepare($select_query);
    $stmt->execute();
} catch (PDOException $e) {
    $errorInfo = $db->errorInfo();
    consolelog($errorInfo, 'DB list fetch', ERROR);
    die('There was an error getting data from the database');
}

echo '<p>success!!!</p>';
//see what we got back

include 'partials/bottom.php';
?>
