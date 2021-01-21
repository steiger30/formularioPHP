<!-- A Ideia pegar o que está no URL  e colocar em $_GET( que é uma variável global) 
depois verificar com isset() se o índice  “nome” existe.
e depois passar para um arry e exibir a lista de tarefas -->


<!DOCTYPE html>
<?php session_start(); ?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Gerenciador de Tarefas</title>
</head>

<body>
    <h1>Gerenciador de Tarefas</h1>
    <form>
        <fieldset>
            <legend>Nova tarefa</legend>
            <label>
                Tarefa:
                <input type="text" name="nome">
            </label>
            <input type="submit" value="Cadastrar">
        </fieldset>
    </form>



    <?php
//verificase existem dados em $_GET
    if(isset($_GET['nome'])){
        $_SESSION['lista_tarefas'][] = $_GET['nome'];
    }

    $lista_tarefas = array();
//criação do array $lista_tarefas para preenchê-lo com os dados da $_SESSION, quando necessário
    if (isset($_SESSION['lista_tarefas'])) {
        $lista_tarefas = $_SESSION['lista_tarefas'];
    }

    ?>

    <table>
        <tr>
            <th>Tarefas</th>
        </tr>
        <?php foreach ($lista_tarefas as $tarefa) : ?>
            <tr>
                <td><?php echo $tarefa; ?> </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>