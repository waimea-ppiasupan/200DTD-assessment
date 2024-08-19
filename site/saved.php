<?php
require '_functions.php';
include 'partials/top.php';

// Connect to the database
$db = connectToDB();

// Setup a query to get all iframe info
$query = 'SELECT * FROM iframe';

try {
    $stmt = $db->prepare($query);
    $stmt->execute();
    $iframes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    consolelog($e->getMessage(), 'DB list fetch', ERROR);
    die('There was an error getting data from the database');
}

// Display the list of iframes
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark" />
    <link rel="stylesheet" href="css/styles.css">
    <title>Saved Iframes</title>
  </head>
  <body>
    <main class="container">
      <h1>Saved Iframes</h1>

      <?php foreach ($iframes as $iframe) : ?>
        <iframe src="<?= htmlspecialchars($iframe['website_url']) ?>" frameborder="0" width="100%" height="500"></iframe>
      <?php endforeach; ?>

    </main>
  </body>
</html>

<?php include 'partials/bottom.php'; ?>