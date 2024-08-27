<?php
require './database/db.php';

// Check if 'id' is passed in the URL and is a valid number
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $task_id = $_GET['id'];

    // SQL query to update the task and mark it as complete
    $sql = "UPDATE tasks SET is_complete = 1 WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':id', $task_id, PDO::PARAM_INT);

    // Execute the query and check if successful
    if ($statement->execute()) {
        // Redirect back to the main page
        header('Location: index.php');
        exit;
    } else {
        echo "Error: Could not mark task as complete.";
    }
} else {
    echo "Error: Invalid task ID.";
}
?>
