<!-- A Ideia pegar o que está no URL  e colocar em $_GET( que é uma variável global) 
depois verificar com isset() se o índice  “nome” existe.
e depois passar para um arry e exibir a lista de tarefas -->

<?php
session_start();
//verificase existem dados em $_GET
if (isset($_GET['nome'])) {
    $_SESSION['lista_tarefas'][] = $_GET['nome'];
}

$lista_tarefas = array();
//criação do array $lista_tarefas para preenchê-lo com os dados da $_SESSION, quando necessário
if (isset($_SESSION['lista_tarefas'])) {
    $lista_tarefas = $_SESSION['lista_tarefas'];
}

include "template/template.php";

?>