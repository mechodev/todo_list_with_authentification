<?php
require_once('Connexion.class.php');
$todos = new Connexion();
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>To-DO Listdi</title>
</head>

<body>
    <form action="verify.php" method="post">
        <div><button type="submit" name="logout">Logout</button></div>
    </form>
    <div class="main-section">
        <div class="add-section">
            <form action="add.php" method="post" autocomplete="off">
                <?php if (isset($_GET['mess']) && $_GET['mess'] == "error") { ?>
                    error
                    <input type="text" style="border-color:#ff6666;" name="title" placeholder="This field is required" id="">
                    <button type="submit" name="submit">Add &nbsp; <span>&#43;</span></button>
                <?php } else { ?>
                    <input type="text" name="title" placeholder="What do you need to do?" id="">
                    <button type="submit" name="submit">Add &nbsp; <span>&#43;</span></button>
                <?php } ?>
            </form>
        </div>
        <?php
        $todo = $todos->bdd->query('SELECT * FROM todos ORDER BY id DESC');
        ?>
        <div class="show-todo-section">
            <?php if ($todo->rowCount() <= 0) { ?>
                <div class="empty">
                    <img src="./img/download.jpeg" width="100%" alt="">
                    <img src="./img/images.png" width="80px">
                </div>
            <?php } ?>
            <?php while ($list = $todo->fetch()) { ?>
                <div class="todo-items">
                    <span id="<?php echo $list['id']; ?>" class="remove-to-do">x
                    </span>
                    <?php if ($list['checked']) { ?>
                        <input data-todo-id="<?php echo $list['id']; ?>" type="checkbox" class="check-box" checked>
                        <h2 class="checked"><?php echo $list['title'] ?></h2><br>
                    <?php } else { ?>
                        <input data-todo-id="<?php echo $list['id']; ?>" type="checkbox" class="check-box">
                        <h2><?php echo $list['title'] ?></h2><br>

                    <?php } ?>
                    <br>
                    <small> created: <?php echo $list['created'] ?></small>
                </div>
            <?php } ?>
        </div>
    </div>
    <script src="./js/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.remove-to-do').click(function() {
                const id = $(this).attr('id');

                $.post('delete.php', {
                        id: id
                    },
                    (data) => {
                        if (data) {
                            $(this).parent().hide(600);
                        }
                    }
                );
            });

            $('.check-box').click(function(e) {
                const id = $(this).attr('data-todo-id');

                $.post('check.php', {
                        id: id
                    },

                    (data) => {
                        if (data != "ERROR") {
                            const h2 = $(this).next();

                            if (data == '1') {
                                h2.removeClass('checked');
                            } else {
                                h2.addClass('checked');
                            }
                        }

                    }
                );
            });
        });
    </script>
</body>

</html>