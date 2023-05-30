<?php
include("conecta.php");
$matricula = $_POST["matricula"];
$nome = $_POST["nome"];
$idade = $_POST["idade"];

if(isset($_POST["inserir"]))
{
    $comando = $pdo->prepare("INSERT INTO alunos (matricula, nome, idade) VALUES (?, ?, ?)");
    $resultado = $comando->execute([$matricula, $nome, $idade]);
    // Redirecionar para o formulário:
    header("Location: cadastro.html");
}

if(isset($_POST["excluir"]))
{
    $comando = $pdo->prepare("DELETE FROM alunos WHERE matricula = ?");
    $resultado = $comando->execute([$matricula]);
    header("Location: cadastro.html");
}

if(isset($_POST["alterar"]))
{
    $comando = $pdo->prepare("UPDATE alunos SET nome = ?, idade = ? WHERE matricula = ?");
    $resultado = $comando->execute([$nome, $idade, $matricula]);
    header("Location: cadastro.html");
}

if(isset($_POST["listar"]))
{
    $comando = $pdo->prepare("SELECT * FROM alunos");
    $resultado = $comando->execute();

    while($linhas = $comando->fetch())
    {
        $m = $linhas["matricula"];
        $n = $linhas["nome"];
        $i = $linhas["idade"];
        echo "Matrícula: $m Nome: $n Idade: $i <br>";
    }
}
?>



