<?php
require './database/db.php';

// Check if the form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the task from the POST request
    $task = $_POST['task'];

    // SQL to insert the new task into the database
    $sql = "INSERT INTO tasks (description) VALUES (:description)";
    
    // Prepare and execute the query
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':description', $task);

    if ($statement->execute()) {
        // Redirect back to the index page after success
        header('Location: index.php');
        exit;
    } else {
        echo "Error: Could not add task";
    }
}
?>
