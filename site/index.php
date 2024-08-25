<?php
require '_functions.php';
include 'partials/top.php';
?>

<!-- Connect to the database -->
<?php
$db = connectToDB();

// Get all iframe info
$query = 'SELECT * FROM iframe';

try {
    $stmt = $db->prepare($query);
    $stmt->execute();
    $iframes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Handle database error
    $error = 'Error: ' . $e->getMessage();
    include 'partials/error.php';
    exit;
}

// Check if $iframes is empty
if (empty($iframes)) {
    $noIframesMessage = 'No iframes found in database.';
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
      <div class="draggable-iframe-group">
        <div class="title-box">
          <h4><?= htmlspecialchars($iframe['title']) ?></h4>
          <div class="actions">
            <a href="<?= htmlspecialchars($iframe['website_url']) ?>" class="clip-btn">🔗</a>
            <a href="#" class="delete-btn" data-iframe-id="<?= $iframe['id'] ?>">🗑</a>
            <a href="explanation.php?id=<?= $iframe['id'] ?>" class="explanation-btn">...</a>
          </div>
        </div>
        <div class="iframe-container">
          <iframe src="<?= htmlspecialchars($iframe['website_url']) ?>" frameborder="0" width="100%" height="300" alt="<?= htmlspecialchars($iframe['title']) ?>"></iframe>
          <div class="resizer"></div>
        </div>
      </div>
    <?php endif; ?>
  <?php endforeach; ?>
<?php else : ?>
  <p><?= $noIframesMessage ?></p>
<?php endif; ?>

<!-- Add new iframe button -->
<div id="add-button">
  <a href="add-recipes.php" id="add-iframe-btn">Add </a>
</div>
     

    </main>

    <!-- Include script.js file -->
    <script src="js/script.js"></script>

  </body>
</html>

<?php include 'partials/bottom.php'; ?>