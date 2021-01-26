<!-- A Ideia pegar o que está no URL  e colocar em $_GET( que é uma variável global) 
depois verificar com isset() se o índice  “nome” existe.
e depois passar para um arry e exibir a lista de tarefas -->

<?php
session_start();
include "banco/banco.php";
include "ajudantes/ajudantes.php";

//verificase existem dados em $_GET
if (isset($_GET['nome']) && $_GET['nome'] != '') {
    $tarefa = array();
    $tarefa['nome'] = $_GET['nome'];

    if (isset($_GET['descricao'])) {

        $tarefa['descricao'] = $_GET['descricao'];
    } else {
        $tarefa['descricao'] = '';
    }
    if (isset($_GET['prazo'])) {
        $tarefa['prazo'] = traduz_data_para_banco($_GET['prazo']);
    } else {
        $tarefa['prazo'] = '';
    }

    $tarefa['prioridade'] = $_GET['prioridade'];

    if (isset($_GET['concluida'])) {
        $tarefa['concluida'] = $_GET['concluida'];
    } else {
        $tarefa['concluida'] = '';
    }

    gravar_tarefa($conexao, $tarefa);
}

$lista_tarefas = buscar_tarefas($conexao);

include "template/template.php";



?>