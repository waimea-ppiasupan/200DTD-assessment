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

// See what we got back
consolelog($iframes);
?>

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
      <h1></h1>
      <h2>New stuff</h2>
      <h3>IFrame lol</h3>

      <?php foreach ($iframes as $iframe) : ?>
  <div class="iframe-container">
    <iframe src="<?= htmlspecialchars($iframe['website']) ?>" title="<?= htmlspecialchars($iframe['id']) ?>"></iframe>
    <ul class="company-list">
      <li>
        <a href="cooking-recipes.php?id=<?= htmlspecialchars($iframe['id']) ?>">
          <?= htmlspecialchars($iframe['id']) ?>
        </a>
        <span class="visit-website-box">
          <a href="<?= htmlspecialchars($iframe['website']) ?>">Visit Website</a>
        </span>
      </li>
    </ul>
  </div>
<?php endforeach; ?>

      <div id="add-button">
        <a href="form-recipes.php">add</a>
      </div>
    </main>
  </body>
</html>

<?php include 'partials/bottom.php'; ?>