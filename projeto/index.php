<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Restaurante </title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> <!-- Bootstrap CSS -->

</head>

<body>
    <script src="js/bootstrap.bundle.min.js"></script> <!-- Bootstrap JS Bundle -->

            <nav class="navbar navbar-expand-lg bg-body" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Restaurante</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Itens
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="?page=cadastrar-item">Cadastrar</a></li>
                        <li><a class="dropdown-item" href="?page=listar-item">Listar</a></li>                        
                    </ul>
                    </li>

                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Pedidos
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="?page=cadastrar-pedido">Cadastrar</a></li>
                        <li><a class="dropdown-item" href="?page=listar-pedido">Listar</a></li>                        
                    </ul>
                    </li>

                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Detalhes de pedidos
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="?page=cadastrar-detalhe">Cadastrar</a></li>
                        <li><a class="dropdown-item" href="?page=listar-detalhe">Listar</a></li>                        
                    </ul>
                    </li>
                
                </ul>
                
                </div>
            </div>
            </nav>

    <div class="container">
        <div class="row">
            <div class="col">

                <?php
                    include("config.php");

                    switch(@$_REQUEST["page"]){
                        //item
                        case 'cadastrar-item':
                            include('cadastrar-item.php');
                            break;

                        case'listar-item':
                            include('listar-item.php');
                            break;

                        case 'editar-item':
                            include('editar-item.php');
                            break;
                        
                        case 'salvar-item':
                            include('salvar-item.php');
                            break;
                        
                        //pedido
                        case 'cadastrar-pedido':
                            include('cadastrar-pedido.php');
                            break;

                        case'listar-pedido':
                            include('listar-pedido.php');
                            break;

                        case 'editar-pedido':
                            include('editar-pedido.php');
                            break;
                        
                        case 'salvar-pedido':
                            include('salvar-pedido.php');
                            break;

                        //detalhe
                        case 'cadastrar-detalhe':
                            include('cadastrar-detalhe.php');
                            break;

                        case'listar-detalhe':
                            include('listar-detalhe.php');
                            break;

                        case 'editar-detalhe':
                            include('editar-detalhe.php');
                            break;
                        
                        case 'salvar-detalhe':
                            include('salvar-detalhe.php');
                            break;

                        
                        default:
                            print "<h1> Bem vindo! </h1>";
                            print "<p> Sistema de cadastro de uma concessionária de veículos </p>";
                    }
                    ?>


            </div>
        </div>


    
</body>
</html>
