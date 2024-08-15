<?php
require '_functions.php';
include 'partials/top.php';

// Connect to the database
$db = connectToDB();

// Get all iframe info
$query = 'SELECT * FROM iframe';

try {
    $stmt = $db->prepare($query);
    $stmt->execute();
    $iframes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage() . '<br>';
    die('There was an error getting data from the database');
}
?>

<!-- HTML code starts here -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark" />
    <link rel="stylesheet" href="css/styles.css">
    <title>Hello yes</title>
  </head>
  <body>
    <main class="container">
      <h2>New stuff</h2>
      <h3>IFrame lol</h3>

     <!-- Display existing iframes -->
<?php if (!empty($iframes)) : ?>
  <?php foreach ($iframes as $iframe) : ?>
    <?php if (!empty($iframe['website_url'])) : ?>
      <div class="iframe-group">
        <div class="title-box">
          <h4><?= htmlspecialchars($iframe['title']) ?></h4>
          <a href="delete-iframe.php?id=<?= $iframe['id'] ?>">🗑</a>
        </div>
        <div class="iframe-container">
          <iframe src="<?= htmlspecialchars($iframe['website_url']) ?>" frameborder="0" width="100%" height="300" alt="<?= htmlspecialchars($iframe['title']) ?>"></iframe>
        </div>
      </div>
    <?php endif; ?>
  <?php endforeach; ?>
<?php else : ?>
  <p>No iframes found.</p>
<?php endif; ?>

      <!-- Add new iframe button -->
      <div id="add-button">
        <a href="form-recipes.php">Add </a>
      </div>
      
    </main>
  </body>
</html>

<?php include 'partials/bottom.php'; ?>