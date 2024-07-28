<?php 
require '_functions.php';
include 'partials/top.php'; 

$db = connectToDB();
      consolelog($db);

      //setup a query to get all company info
$query = 'SELECT * FROM iframe ORDER by name ASC';
//attempt to run the query
try {
    $stmt = $db ->prepare($query);
    $stmt ->execute();//pass in the data
    $iframes = $stmt ->fetchAll();
}catch (PDOException $e) {
    consolelog($e->getMessage(), 'DB list fecth', ERROR);
    die('There was an error getting data from the database');

}consolelog($iframes);

?>

<h2> New recipe</h2>

<form method="post" action = "add-recipes.php">
    <label>website name</label>
    <input name="name" type="text" 
    placeholder="e.g. your mum's name" required >

    <label>Notes</label>
    <input name="code" type="text" 
    placeholder="e.g. LORD4" 
    minlength="3" maxlength="3" required >

    <label></label>
    <select name="iframe">
    <?php
    foreach($iframes as $iframe) {
        echo '<option value = "'.$iframe['id'].'">';
        echo   $iframe['website'];
        echo '</option>';
    }
?>
    </SELECT>
   
    <label>sales</label>
    <input name="sales" placeholder="e.g 200000" type="number" required>
    
    <input type="submit" value="add" required>
    
</form>

