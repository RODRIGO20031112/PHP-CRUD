<?php
function criarDados($nome, $idade, $nacionalidade) {
    if (!isset($_SESSION['id'])) {
        $_SESSION['id'] = 0;
    }

    $dados = array(
        "id" => $_SESSION['id']+=1,
        "nome" => $nome,
        "idade" => $idade,
        "nacionalidade" => $nacionalidade
    );

    return $dados;
}

function relerDados($dados) {
    if (isset($dados)) {
        foreach($dados as $valor) {
            echo 
                "<form action='index.php' method='post' style='margin: 20px; padding: 20px; border: 1px solid #ccc; border-radius: 5px;'>",
                "ID: <input type='text' name='id' value='", $valor['id'], "' readonly><br>",
                "Nome: <input type='text' name='nome' value='", $valor['nome'], "'><br>", 
                "Idade: <input type='text' name='idade' value='", $valor['idade'], "'><br>",
                "Nacionalidade: <input type='text' name='nacionalidade' value='", $valor['nacionalidade'], "'><br>",
                "<input type='submit' name='action' value='update' style='padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;'>",
                "<input type='submit' name='action_delete' value='delete' style='padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; margin-left: 10px;'>",
                "</form>";
        }
    }
}

function updateDados() {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $idade = $_POST['idade'];
        $nacionalidade = $_POST['nacionalidade'];

        foreach ($_SESSION['dados'] as $key => $value) {
            if ($value['id'] == $id) {
                $_SESSION['dados'][$key] = array(
                    "id" => $id,
                    "nome" => $nome,
                    "idade" => $idade,
                    "nacionalidade" => $nacionalidade
                );
                break;
            }
        }
}

function deletarDados() {
    $id = $_POST['id'];

    foreach($_SESSION['dados'] as $key => $value) {
        if($value['id'] == $id) {
            unset($_SESSION['dados'][$key]);

            $_SESSION['dados'] = array_values($_SESSION['dados']);
            break;
        }
    }
}
?>
