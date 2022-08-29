<?php
$todos = [];
if (file_exists("todo.json")) {
    $json = file_get_contents("todo.json");
    $todos = json_decode($json, true);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="app.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center">TODO APPLICATION</h1>
        <form action="newtodo.php" method="post">
            <input class="form-control" type="text" name="todo_name" placeholder="Enter you todo">
            <button class="btn">New Todo</button>
        </form>
        <h2 class="text-center border-topbottom">TODO(S)</h2>
        <table>
        <?php foreach($todos as $todoName => $todo):?>
            <tr>
                <td>
                    <form style="display: inline-block" action="change_status.php" method="post">
                        <input type="hidden" name="todo_name" value="<?php echo $todoName ?>" />
                        <input type="checkbox" <?php echo $todo['completed'] ? 'checked' : ''; ?> />
                    </form>
                </td>
                <td><?php echo $todoName; ?></td>
                <td>
                    <form style="display: inline-block" action="delete.php" method="post">
                        <input type="hidden" name="todo_name" value="<?php echo $todoName; ?>">
                        <button class="btn">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </table>
    </div>

    <script>
        const checkboxes = document.querySelectorAll('input[type=checkbox]');
        checkboxes.forEach(ch => {
            ch.onclick = function () {
                this.parentNode.submit();
            };
        })
    </script>
</body>
</html>