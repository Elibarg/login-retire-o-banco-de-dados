<?php
// $_POST pega as informações do input
$login = $_POST["login"];
$senha = $_POST["senha"];

include("conecta.php"); //conecta com o bando de dados

$comando = $pdo->prepare("SELECT * FROM usuario WHERE login = '$login' and senha = '$senha' ");
$resultado = $comando->execute();
$n = 0;
$admim = "n";

while($linhas = $comando->fetch())
{
    $n = 1;
    $admim = $linhas["admim"];
 }

if($n == 0)
{
    header("location:index.html");
}
if($n == 1)
{
    if($admim == "s")
    {
        header("location:admim.html");
    } 
    else{
        header("location:usuario.html");
    }
}
?>
