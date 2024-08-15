
<?php
require '_functions.php';
include 'partials/top.php';

// Connect to the database
$db = connectToDB();

// Check if the form has been submitted
if (!empty($_POST)) {
    // Validate the user input
    $title = htmlspecialchars($_POST['title']);
    $website_url = htmlspecialchars($_POST['website_url']);
    $width = htmlspecialchars($_POST['width']);
    $height = htmlspecialchars($_POST['height']);
    $iframe_code = htmlspecialchars($_POST['iframe_code']);

    // Insert the data into the database
    $query = 'INSERT INTO iframe (title, website_url, width, height, iframe_code) VALUES (:title, :website_url, :width, :height, :iframe_code)';
    try {
        $stmt = $db->prepare($query);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':website_url', $website_url, PDO::PARAM_STR);
        $stmt->bindParam(':width', $width, PDO::PARAM_INT);
        $stmt->bindParam(':height', $height, PDO::PARAM_INT);
        $stmt->bindParam(':iframe_code', $iframe_code, PDO::PARAM_STR);
        $stmt->execute();
        header('Location: index.php');
        exit;
    } catch (PDOException $e) {
        consolelog($e->getMessage(), 'DB insert', ERROR);
        die('There was an error inserting data into the database');
    }
}
?> <!-- Add this closing tag -->

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark" />
    <link rel="stylesheet" href="css/styles.css">
    <title>Add Recipe</title>
  </head>
  <body>
    <h1>Add Recipe</h1>
    <form method="post">
      <h2>Recipe Information</h2>
      <label for="title">Title:</label>
      <input type="text" id="title" name="title" required>

      <label for="website_url">Website URL:</label>
      <input type="url" id="website_url" name="website_url" required>

      <label for="width">Width:</label>
      <input type="number" id="width" name="width" required>

      <label for="height">Height:</label>
      <input type="number" id="height" name="height" required>

      <label for="iframe_code">Iframe Code:</label>
      <textarea id="iframe_code" name="iframe_code" required></textarea>

      <button type="submit">Add Recipe</button>
    </form>
  </body>
</html>