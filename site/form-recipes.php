<?php
require '_functions.php';
include 'partials/top.php'; 
?>

<h1>Form Submission</h1>
<link rel="stylesheet" href="styles.css">

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <label for="iframe_id">Iframe ID:</label>
  <input type="text" id="iframe_id" name="iframe_id"><br><br>
  <label for="notes">Notes:</label>
  <textarea id="notes" name="notes"></textarea><br><br>
  <label for="website">Website:</label>
  <input type="text" id="website" name="website"><br><br>
  <input type="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $iframe_id = strtoupper($_POST['iframe_id'] ?? '');
  $notes = $_POST['notes'] ?? '';
  $website = $_POST['website'] ?? '';

  echo 'Iframe ID: ' . $iframe_id . '<br>';
  echo 'Notes: ' . $notes . '<br>';
  echo 'Website: ' . $website . '<br>';

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

  echo '<p>Success!!!</p>';
}
?>

<?php
include 'partials/bottom.php';
?>
