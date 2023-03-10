<?php 

session_start();

if (!isset($_SESSION['tasks'])){
    $_SESSION['tasks'] = array();
}

if (isset($_GET['task_name'])){
    if ($_GET['task_name'] != ""){
        array_push($_SESSION['tasks'], $_GET['task_name']);
        unset($_GET['task_name']);
    } else{
        $_SESSION['message'] = "O campo nome da tarefa não pode estar vazio, por favor insira um nome!";
    }
}

if (isset($_GET['clear'])){
    unset($_SESSION['tasks']);
    unset($_GET['clear']);
}

if (isset($_GET['key'])){
    array_splice($_SESSION['tasks'], $_GET['key'], 1);
    unset($_GET['key']);
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
            <?php
                if(isset( $_SESSION["message"])){
                    echo "<p style='color: #EF5350'>" . $_SESSION["message"] . "</p>";
                    unset($_SESSION["message"]);
                }
            ?>
        </div>

        <div class="separator"></div>

        <div class="list-task">
            <?php 
                if (isset($_SESSION['tasks'])){
                    echo "<ul>";

                    foreach($_SESSION['tasks'] as $key => $task){
                        echo "<li>
                            <span>$task</span>
                            <button type='button' class='btn-clear1' onClick='deletar$key()'>Remover</button>
                            <script>
                                function deletar$key(){
                                    if (confirm('Confirmar remoção?')){
                                        window.location = 'http://localhost:8080/?key=$key';
                                    }
                                    return false;
                                }
                            </script>
                        </li>";
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