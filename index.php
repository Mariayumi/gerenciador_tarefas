<?php 

session_start();

if (!isset($_SESSION['tasks'])){
    $_SESSION['tasks'] = array();
}

if (isset($_GET['task_name'])){
    array_push($_SESSION['tasks'], $_GET['task_name']);
    unset($_GET['task_name']);
}

if (isset($_GET['clear'])){
    unset($_SESSION['tasks']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" >
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <title>Gerenciador de tarefas</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Gerenciador de tarefas</h1>
        </div>

        <div class="form">
            <form action="" method="get">
                <label for="task_name">Tarefa: </label>
                <input type="text" name="task_name" placeholder="Nome da tarefa"></input>
                <button type="submit">Cadastrar</button>
            </form>
        </div>

        <div class="separator"></div>

        <div class="list-task">
            <?php 
                if (isset($_SESSION['tasks'])){
                    echo "<ul>";

                    foreach($_SESSION['tasks'] as $key => $task){
                        echo "<li>$task</li>";
                    }

                    echo "</ul>";
                }
            ?>
        </div>

        <form action="" method="get">
            <input type="hidden" name="clear" value="clear">
            <button type="submit" class="btn-clear">Limpar Tarefas</button>
        </form>

        <div class="footer">
            <p>Projeto criado por AM Projetos Web </p>
            <p>Desenvolvido por Mariana A. Tamay </p>
        </div>
    </div>
</body>
</html>