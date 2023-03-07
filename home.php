<?php
include('config.php');

if($_POST){
    if(isset($_POST['search'])){
        if(empty($_POST['textSearch'])){
            $_SESSION['vazio-search'] = true;
        }else{
            header('Location: home.php?search='.$_POST['textSearch']);
        }
    }else if(isset($_POST['view'])){
        if(empty($_POST['result'])){
            $_SESSION['vazio-view']= true;
        }else{
            header('Location: home.php?view='.$_POST['result']);
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
    <title>Home</title>
    <style>
        *{
            padding: 0px;
            margin: 0px;
            font-family: Arial;
            font-size: 18px;
        }
        body{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
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
        header{
            height: 70px;
            width: 100%;
            background-color: black;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            text-align: center;
            align-items: center;
        }
        header p{
            font-size: 25px;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 3px;
            color: white;
            margin-left: 20px;
        }
        header div{
            display: flex;
            flex-direction: row;
            justify-content: center;
            text-align: center;
            align-items: center;
        }
        header div a{
            text-decoration: none;
            height: 60px;
            display: flex;
            flex-direction: row;
            justify-content: center;
            text-align: center;
            align-items: center;
            margin-right: 10px;
            padding-left: 10px;
            padding-right: 10px;
        }
        header div a p{
            margin-left: 0px;
            text-transform:none;

        }
        header div a:hover{
            cursor: pointer;
            background-color: rgb(54, 53, 53);
        }
        main{
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
            align-items: center;
            width: 80vw;
            height: 100vh;
            /* background-color: red; */
        }
        section{
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
            align-items: center;
            width: 70vw;
            height: 60vh;
            background-color: white;
            border-radius: 10px;
        }
        form{
            /* background-color: red; */
            /* display: flex;
            flex-direction: column; */
            width:  100%;
            height: 100%;
        }
        #menu-pesquisa{
            width: 800px;
            height: 30px;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            margin-left: auto;
            margin-right: auto;
            margin-top: 10px;
        }
        form div button{
            width: 110px;
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
        form input{
            font-size: 17px;
            padding: 3px;
            width: 200px;
            outline: none;
            transition: 0.5s;
        }
        form input:hover{
            background-color: #ebecec;
        }
        form input:focus{ 
            background-color: #dadddd;
        }
        form select{
            font-size: 17px;
            padding: 3px;
            width: 210px;
            outline: none;
        }
        hr{
            margin-top: 10px;
            margin-bottom: 10px;
        }
        #dados{
            width: 80%;
            height: 80%;
            /* background-color: green; */
            margin-left: auto;
            margin-right: auto;
        }
        #dados-user{
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            text-align: justify;
            /* background-color: red; */
            padding: 20px;
        }
        #dados-user p{
            margin-bottom: 10px;
            font-size: 25px;
        }
        #erro{
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-top: 10px;
            width: 400px;
            height: 50px;
            background-color: #f03e3e;
            border-radius: 10px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
    <header>
        <p>Home</p>
        <div>
            <a href="" id="drop"><div id="dropbar"></div></a>
            <a href="home.php"><p>Home</p></a>
            <a href="tutor.html"><p>Tutorial</p></a>
        </div>
    </header>
    <main>
        <section>
            <form method="post" autocomplete="off">
                <div id="menu-pesquisa">
                    <div>
                        <input type="text" name="textSearch" id="textSearch" placeholder="Ex. Alexandre">
                        <button name="search">Pesquisar</button>
                        
                    </div>
                    <a href="home.php"><img src="img/att.png" alt="Icone de F5" width="30px"></a>
                    <div>
                        <select name="result" id="result">
                            <option value="">Usuários</option>
                            <?php
                                if($_GET['search']){
                                    $search = $_GET['search'];
                                    $query = 'SELECT * FROM vwcliente WHERE nome LIKE "%'.$search.'%"';
                                    $res = $GLOBALS['conn']->query($query);
                                    foreach($res as $row){
                                    echo '<option value="'.$row['cd'].'">'.$row['cd'].' - '.$row['nome'].'</option>';
                                    }
                                }else{
                                    $query = 'SELECT * FROM vwcliente';
                                    $res = $GLOBALS['conn']->query($query);
                                    foreach($res as $row){
                                    
                                    echo '<option value="'.$row['cd'].'">'.$row['cd'].' - '.$row['nome'].'</option>';
                                    }
                                }      
                            ?>
                        </select>
                        <button name="view">Mostrar</button> 
                    </div>
                </div>
                <hr>
                <div id="dados">
                    <?php
                        if($_GET){
                            if(isset($_GET['view'])){
                                $query = 'SELECT * FROM vwcliente WHERE cd = '.$_GET['view'];
                                $res = $GLOBALS['conn']->query($query);
                                foreach($res as $row){
                                    echo '
                                        <div id="dados-user">
                                            <p>Código: '.$row['cd'].'</p>
                                            <p>Nome: '.$row['nome'].'</p>
                                            <p>Email: '.$row['email'].'</p>
                                            <p>CPF: '.$row['cpf'].'</p>
                                            <p>Data de cadastro: '.$row['data_cadastro'].'</p>
                                            <p>Tipo de vaga: '.$row['tipo_vaga'].'</p>
                                            <p>Veículo: '.$row['modelo_veiculo'].' - '.$row['marca_veiculo'].'</p>
                                        </div>
                                    ';
                                }
                            }
                        }
                    ?>
                    <?php
                        if(isset($_SESSION['vazio-search'])):
                    ?>   
                    <div id="erro">
                        <p>Digite algo na barra para pesquisar!</p>   
                    </div>
                    <?php
                        endif;
                        unset($_SESSION['vazio-search']);
                    ?>
                    <?php
                        if(isset($_SESSION['vazio-view'])):
                    ?>   
                    <div id="erro">
                        <p>Selecione um cliente para visualizar!</p>   
                    </div>
                    <?php
                        endif;
                        unset($_SESSION['vazio-view']);
                    ?>

                    <!-- <div id="dados-user">
                        <p>Código: </p>
                        <p>Nome: </p>
                        <p>Email: </p>
                        <p>CPF: </p>
                        <p>Data de cadastro: </p>
                        <p>Tipo de vaga: </p>
                        <p>Veículo: </p>
                    </div> -->
                </div>
            </form> 
        </section>
    </main>
</body>
</html>