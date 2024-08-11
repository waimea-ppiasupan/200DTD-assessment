
<?php
require '_functions.php';
include 'partials/top.php';

consolelog($_POST, 'POST Data');
$code = strtoupper($_POST['code']);//force to upper case for strtrouupper
$name = $_POST['name'];
$website = $_POST['iframe']; // assuming this is the correct field

echo ' code: ' . $code;
echo ' name: ' . $name;
echo ' website: ' . $website;

$db = connectToDB();

$query = 'INSERT INTO iframe (iframe, notes, description) VALUES (:iframe, :notes, :description)';

$stmt = $db->prepare($query);
$stmt->bindParam(':iframe', $website);
$stmt->bindParam(':notes', $code);
$stmt->bindParam(':description', $name);

try {
    $stmt->execute();
    echo '<p>success!!!</p>';
} catch (PDOException $e) {
    consolelog($e->getMessage(), 'DB list fecth', ERROR);
    die('There was an error getting data from the database');
}

include 'partials/bottom.php';
?>