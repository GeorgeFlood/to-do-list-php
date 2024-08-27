<?php

require './database/db.php';

if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM tasks WHERE id = :id";
    $statement = $pdo ->prepare($sql);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);

if ($statement->execute()){
    header('Location: index.php');
    exit;
} else {
    echo'ERROR: Could not delete task.';
} 

} else {
    echo 'ERROR: invalid task ID';
 }
?>
