<?php
include('config.php');
if($_POST){
    if(isset($_POST['submit'])){
        if(empty($_POST['email']) || empty($_POST['password'])){
            $_SESSION['campo-vazio'] = true;
        }else{ 
            Login($_POST['email'], $_POST['password']);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        *{
            padding: 0px;
            margin: 0px;
            font-family: Arial;
            font-size: 18px;
        }
        body{
            display: flex;
            flex-direction: row;
            justify-content: center;
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            height: 100vh;
        }
        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
        main{
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
            align-items: center;
            width: 500px;
            height: 100vh;
            /* background-color: red; */
        }
        form{
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
            align-items: center;
            width: 400px;
            height: 300px;
            border-radius: 10px;
            background-color: white;
        }
        form div{
            display: flex;
            flex-direction: column;
            text-align: start;
            width: 90%;
            margin-top: 20px;
            /* background-color: green; */
        }
        form div label{
            margin-bottom: 5px;
        }
        form div button{
            width: 100px;
            margin-left: auto;
            margin-right: auto;
            background-color: #202020;
            color: white;
            outline: none;
            border: none;
            height: 30px;
            border-radius: 4px;
            transition: 0.5s;
        }
        form div button:hover{
            cursor: pointer;
            background-color: #3f3f3f;
        }
        form div button:focus{
            background-color: #302f2f;
        }
        form p{
            font-size: 25px;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 3px;
            color: black;
        }
        form input{
            font-size: 17px;
            padding: 3px;
            border: none;
            border-bottom: 1px solid black;
            outline: none;
            transition: 0.5s;
        }
        form input:hover{
            background-color: #ebecec;
        }
        form input:focus{
            background-color: #dadddd;
        }
        #erro-login{
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-top: 10px;
            width: 400px;
            height: 50px;
            background-color: red;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <main>
        <form method="post" autocomplete="off">
            <p>Login</p>
            <div>
                <label for="email">Digite seu email:</label>
                <input type="email" name="email" id="email">
            </div>
            <div>
                <label for="password">Digite sua senha:</label>
                <input type="password" name="password" id="password"> 
            </div>
            <div>
                <button name="submit">Enviar</button>
            </div>
        </form>    
        
        <?php
            if(isset($_SESSION['erro-login'])):
        ?>   
        <div id="erro-login">
            <p>Email e/ou senha inválidos! Tente novamente!</p>   
        </div>
        <?php
            endif;
            unset($_SESSION['erro-login']);
        ?>
        <?php
            if(isset($_SESSION['campo-vazio'])):
        ?>   
        <div id="erro-login">
            <p>Preencha todos os campos!</p>   
        </div>
        <?php
            endif;
            unset($_SESSION['campo-vazio']);
        ?>
    </main>
</body>
</html>