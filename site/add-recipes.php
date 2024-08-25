<?php
require '_functions.php';
include 'partials/top.php';

consolelog($_POST, 'POST Data');

var_dump($_SERVER['REQUEST_METHOD']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $website_url = $_POST['website_url'];
    $title = $_POST['title'];
    $width = $_POST['width'];
    $height = $_POST['height'];
    $iframe_code = $_POST['iframe_code'];
    $explanation = $_POST['explanation'];

    echo ' Website URL: ' . $website_url;
    echo ' Title: ' . $title;
    echo ' Width: ' . $width;
    echo ' Height: ' . $height;
    echo ' iFrame Code: ' . $iframe_code;
    echo ' Explanation: ' . $explanation;

    $db = connectToDB();

    $query = 'INSERT INTO iframe (website_url, title, width, height, iframe_code) VALUES (?,?,?,?,?)';
    $query2 = 'INSERT INTO website_explanations (iframe_id, explanations) VALUES (?,?)';

    try {
        $stmt = $db->prepare($query);
        $stmt->execute([$website_url, $title, $width, $height, $iframe_code]);

        $iframe_id = $db->lastInsertId();

        $stmt = $db->prepare($query2);
        $stmt->execute([$iframe_id, $explanation]);
    } catch (PDOException $e) {
        consolelog($e->getMessage(), 'DB insert error', ERROR);
        die('There was an error inserting data into the database');
    }

    echo '<p>Recipe added successfully!</p>';
} else {
    echo 'Error: Form not submitted.';
    var_dump($_SERVER['REQUEST_METHOD']);
}

include 'partials/bottom.php';
?>