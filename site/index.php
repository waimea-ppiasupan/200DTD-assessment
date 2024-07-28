<?php 
require '_functions.php';
include 'partials/top.php'; ?>
<h2> </h2>

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
      <h2> New stuff</h2>
<h3>IFrame lol </h3>

    <iframe src="https://dt.waimea.school.nz" title="W3Schools Free Online Web Tutorials"></iframe>
        <iframe src="https://excalidraw.com/" title="W3Schools Free Online Web Tutorials"></iframe>
        <iframe src="https://www.waimea.school.nz/" title="W3Schools Free Online Web Tutorials"></iframe>
          <iframe src="https://www.waimea.school.nz/" title="W3Schools Free Online Web Tutorials"></iframe>
        </main>
  </body>
</html>
<?php
$db = connectToDB();
      consolelog($db);

      //setup a query to get all company info
$query = 'SELECT * FROM iframe';
//attempt to run the query
try {
    $stmt = $db ->prepare($query);
    $stmt ->execute();
    $iframes = $stmt ->fetchAll();

}
catch (PDOException $e) {
    consolelog($e->getMessage(), 'DB list fecth', ERROR);
    die('There was an error getting data from the database');

}
//see what we got back
consolelog($iframes);
echo '<ul>';
echo '<ul id="company-list">';
foreach($iframes as $iframe) {
    echo '<li>';
    echo '<a href="cooking-recipes.php?code='.$iframe['code'].'">';
    echo $iframe['id'];
    echo '</a>';
    echo '<a href="'. $iframe['website'] .'">';
    echo '🔗';
    echo '</a>';
    echo '</li>';

}
echo '<div id="add-button">
          <a href="form-recipes.php">
          add
          </div>';


 include 'partials/bottom.php'; ?>