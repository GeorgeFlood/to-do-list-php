<?php
// Include the database connection
require './database/db.php';

// Fetch all tasks from the database
$sql = "SELECT * FROM tasks";
$statement = $pdo->prepare($sql);
$statement->execute();
$tasks = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List PHP</title>
</head>
<body>
    <div class="container">
        <h3>To do list with PHP</h3>
         
        <form action="add_task.php" method="POST">
           <input type="text" name="task" placeholder="New task..." required>
           <button type="submit">Submit</button>   
        </form>

        <ul>
         <?php foreach ($tasks as $task): ?>
            <li>
                <?php echo htmlspecialchars($task['description']); ?>

            <?php if(!$task['is_complete']): ?>
                <a href="complete_task.php?id=<?php echo $task['id']; ?>">Completed</a>
                <?php  endif; ?>

                <a href="delete_task.php?id=<?php echo $task['id']; ?>">Delete</a>
            </li>
         <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
