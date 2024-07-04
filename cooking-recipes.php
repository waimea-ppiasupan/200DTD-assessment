<?php 
require '_functions.php';
include 'partials/top.php'; 

$db = connectToDB();
      consolelog($db);

      //setup a query to get all company info
$query = 'SELECT * FROM company ORDER by name ASC';
//attempt to run the query
try {
    $stmt = $db ->prepare($query);
    $stmt ->execute();//pass in the data
    $companies = $stmt ->fetchAll();
}catch (PDOException $e) {
    consolelog($e->getMessage(), 'DB list fecth', ERROR);
    die('There was an error getting data from the database');

}consolelog($companies);

?>

<h2> New Game</h2>

<form method="post" action = "add-game.php">
    <label>name</label>
    <input name="name" type="text" 
    placeholder="e.g. your mum's name" required >

    <label>Code</label>
    <input name="code" type="text" 
    placeholder="e.g. LORD4" 
    minlength="3" maxlength="3" required >

    <label>company</label>
    <select name="company">
    <?php
    foreach($companies as $company) {
        echo '<option value = "'.$company['code'].'">';
        echo   $company['name'];
        echo '</option>';
    }
?>
    </SELECT>
   
    <label>sales</label>
    <input name="sales" placeholder="e.g 200000" type="number" required>
    
    <input type="submit" value="add" required>
    
</form>

