<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >

    <title>Gym Sollution</title>
 </head>
 <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color: darkred">
    <a class="navbar-brand" href="#"><img src="img/logo1.png" width="25%"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="index.php">Início <span class="sr-only">(Página atual)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?page=listar"></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?page=novo_usuario">Cadastre-se</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?page=sobre">Sobre nós</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?page=contato">Contato</a>
        </li>
            
        </ul>
        
    </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col mt-5">

   
    <?php   
        include("config.php");
        

        switch(@$_REQUEST["page"]){


            case"novo_usuario" :
                include("novo_usuario.php");
            break;

            case "listar":
                include("listar.php");
            break;

            case "contato":
                include("contato.php");
            break;

            case "salvar":
                include("salvar.php");
            break;
            
            case "editar":
                include("editar.php");
            break;

            case "sobre":
                include("sobre.php");
                break;
            default:
                include("conteudo.php");
                break;
        }
    ?>
            </div>
        </div>
    </div>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    
    
  </body>

</html>