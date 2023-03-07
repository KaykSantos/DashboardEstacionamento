<?php 
session_start();
define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'dbestacionamento');

$conn = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar ao banco');

//CRUD Funcionário
function Login($email, $password){
    $hash = md5($password);
    $query = 'SELECT * FROM funcionario WHERE email_funcionario = "'.$email.'" AND senha_funcionario = "'.$hash.'"';
    $res = $GLOBALS['conn']->query($query);
    $row = mysqli_num_rows($res);
    if($row == 1){
        header('Location: home.php');
    }else{
        $_SESSION['erro-login'] = true;
    }
}