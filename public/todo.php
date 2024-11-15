<?php
session_start();

if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['new_task']) && $_POST['new_task'] != '') {
        $_SESSION['tasks'][] = htmlspecialchars($_POST['new_task']);
    } elseif (isset($_POST['delete_task'])) {
        $task_index = intval($_POST['delete_task']);
        unset($_SESSION['tasks'][$task_index]);
        $_SESSION['tasks'] = array_values($_SESSION['tasks']);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
</head>
<body>
    <h1>To-Do List</h1>
    <form method="POST">
        <input type="text" name="new_task" placeholder="Enter a new task">
        <button type="submit">Add Task</button>
    </form>
    <ul>
        <?php foreach ($_SESSION['tasks'] as $index => $task): ?>
            <li>
                <?php echo $task; ?>
                <form method="POST" style="display:inline;">
                    <button type="submit" name="delete_task" value="<?php echo $index; ?>">Delete</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
