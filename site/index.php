<?php 
require '_functions.php';
include 'partials/top.php'; ?>
<h2> get a new mum</h2>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark" />
    <link rel="stylesheet" href="css/pico.min.css">
    <title>Hello world!</title>
  </head>
  <body>
    <main class="container">
      <h1>yo mum fat</h1>
      <h2> New cooking recipe</h2>

<form method="post" action = "add-company.php">
    <label>code</label>
    <input name="code" type="text" placeholder="e.g. your mum's name" minlength="3" maxlength="3" pattern="[A-Z][A-z][A-Z]"required >
    <label>name</label>
    <input name="name" type="text"placeholder="yes" required>
    <label>website</label>
    <input name="website" placeholder="im an npc.com" type="url" required>
    <input type="submit" value="add" required>
</form>
<h3>IFrame Demo</h3>

    <iframe src="https://dt.waimea.school.nz" title="W3Schools Free Online Web Tutorials"></iframe>
        <iframe src="https://excalidraw.com/" title="W3Schools Free Online Web Tutorials"></iframe>
        <iframe src="https://www.waimea.school.nz/" title="W3Schools Free Online Web Tutorials"></iframe>
    </main>
  </body>
</html>


<?php include 'partials/bottom.php'; ?>