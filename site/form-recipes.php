<?php require_once '_functions.php';
include 'partials/top.php'; ?>

<h2>Add New Recipe</h2>

<form method="post" action="add-recipes.php">
    <label>Website URL:</label>
    <input name="website_url" type="url" placeholder="e.g. https://example.com" required>
    <label>Title:</label>
    <input name="title" type="text" placeholder="e.g. Recipe Title" required>
    <label>Width:</label>
    <input name="width" type="number" required>
    <label>Height:</label>
    <input name="height" type="number" required>
    <label>iFrame Code:</label>
    <textarea name="iframe_code" required></textarea>
    <label>Explanation:</label>
    <textarea name="explanation" required></textarea>
    <input type="submit" value="Add Recipe" required>
</form>