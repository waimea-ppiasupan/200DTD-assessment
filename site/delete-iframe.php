<?php
require '_functions.php';

define('SUCCESS', 'Iframe deleted successfully!');
define('ERROR', 'Error deleting iframe!');

$id = $_GET['id'] ?? '';
// SQL we need to get the iframe info....
// SELECT * FROM iframe WHERE id = xxx

// Connect to the database
$db = connectToDB();

// Setup a query to delete the iframe
$query = 'DELETE FROM iframe WHERE id = ?';
// Attempt to run the query
try {
    $stmt = $db->prepare($query);
    $stmt->execute([$id]); // Pass in the data

    // Log a success message
    consolelog("Iframe with ID $id deleted successfully", 'DB delete', SUCCESS);

} catch (PDOException $e) {
    consolelog($e->getMessage(), 'DB delete', ERROR);
    die('There was an error deleting iframe from the database');
}

// Redirect to the index page
header('location: index.php');
exit;