<?php
  //requerimento da classes de bd 
  require_once('db.class.php'); 

  //Nova instancia de banco de dados
  $obj_db = new db();

  //Cria conexão
  $linkConect = $obj_db -> conecta_mysql();

  //teste se as variaveis estão nullas
  if($_GET['nameproduct'] == '' )
  {

  }else{
   $nameproduct = $_GET['nameproduct'];
   $descproduct = $_GET['descproduct'];
   $valueproduct = $_GET['valueproduct'];
   $catproduct = $_GET['catproduct'];

    $sql = "insert into tb_produtos (Nome, descricao, valor, fk_categoria) values ( '$nameproduct', '$descproduct', '$valueproduct', '$catproduct')";

    //faz o insert das informações de produtos no banco de dados
    $result = mysqli_query($linkConect , $sql );

  }
  
?>

<!DOCTYPE HTML>
<html  >
<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>Projeto Olist</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
  
</head>
<body>
  
  <section class="menu cid-s48OLK6784" once="menu" id="menu1-h">
    
    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
        <div class="container">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="">
                        <img src="" alt="" style="height: 3.8rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-black display-7" href="https://olist.com/">Olist</a></span>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                  <li class="nav-item"><a class="nav-link link text-black display-4" href="enviar.php">Enviar</a></li>
                  <li class="nav-item"><a class="nav-link link text-black display-4" href="listar.php">Listar Produtos</a></li>
                  <li class="nav-item"><a class="nav-link link text-black display-4" href="inserir.php">Inserir Produto</a></li>
                  <li class="nav-item"><a class="nav-link link text-black display-4" href="editar.php">Editar Produto</a></li>
                  <li class="nav-item"><a class="nav-link link text-black display-4" href="excluir.php">Excluir Produto</a></li>
                </ul>
            </div>
        </div>
    </nav>

</section>

<section class="header1 cid-s48MCQYojq mbr-fullscreen mbr-parallax-background" id="header1-f">

    

    <div class="mbr-overlay" style="opacity: 0.8; background-color: rgb(255, 255, 255);"></div>

    <div class="align-center container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                
                <h2>Novo produto inserido com sucesso!</h2>
                <!-- Formulario para cadastro de novos produtos -->
                <form method="GET" action="inserir_bd.php">
                  <div class="form-group">
                      <label for="exampleInputEmail1">Nome do Produto</label>
                      <input type="text" class="form-control" id="nameProd" aria-describedby="emailHelp" name="nameproduct">
                  </div>
                 <div class="form-group">
                      <label for="exampleInputEmail1">Descrição do produto</label>
                      <input type="text" class="form-control" id="nameProd" aria-describedby="emailHelp" name="descproduct">
                  </div>

                  <div class="form-group">
                      <label for="exampleInputEmail1">Valor do produto</label>
                      <input type="text" class="form-control" id="nameProd" aria-describedby="emailHelp" name="valueproduct">
                  </div>

                 <div class="form-group col-md-12">
                      <label for="inputEstado">Categoria</label>
                           <select id="inputEstado" class="form-control" name="catproduct">
                                <option selected>Escolher...</option>
                                <?php 

                                        //requerimento da clas e bd 
                                        require_once('db.class.php'); 

                                        //Nova instancia de banco de dados
                                        $obj_db = new db();

                                        //Cria conexão
                                        $linkConect = $obj_db -> conecta_mysql();

                                        //teste se as variaveis estão null

                                        $sql = "select * from tb_categorias";


                                        $result = mysqli_query($linkConect , $sql );

                                        
                                        while($registrocategoria = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                          $valorcategoria = $registrocategoria['Nome'];


                                          //Verifica o ID da categoria
                                          $idCategoria ;
                                          switch ($valorcategoria) {
                                                          case 'Móveis':
                                                              $idCategoria = 2;
                                                              break;
                                                          case 'Decoração':
                                                              $idCategoria = 3;
                                                              break;
                                                          case 'Celular':
                                                              $idCategoria = 4;
                                                              break;
                                                          case 'Informática':
                                                              $idCategoria = 5;
                                                              break;
                                                              
                                                          case 'Brinquedos':
                                                              $idCategoria = 6;
                                                              break;    
                                                      }
                                          //Loop de repetição para preenchimento do Html
                                          echo "<option value = $idCategoria> $valorcategoria</option>";
                                        }
                                        ?>
                           </select>
                   </div>


                      <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
                
            </div>
        </div>
    </div>
</section>


<section class="footer3 cid-s48P1Icc8J" once="footers" id="footer3-i">

    

    

    <div class="container">
        <div class="media-container-row align-center mbr-white">
            <div class="row row-links">
                <ul class="foot-menu">
                    
                    
                    
                    
                <li class="foot-menu-item mbr-fonts-style display-7"></li><li class="foot-menu-item mbr-fonts-style display-7"></li><li class="foot-menu-item mbr-fonts-style display-7"></li></ul>
            </div>
           
      
        </div>
    </div>
</section>

<section style="background-color: #fff; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif; color:#aaa; font-size:12px; padding: 0; align-items: center; display: flex;"><a href="https://mobirise.site/k" style="flex: 1 1; height: 3rem; padding-left: 1rem;"></a><p style="flex: 0 0 auto; margin:0; padding-right:1rem;"><a href="" style="color:#aaa;"></a> </p>
</section>

<script src="assets/web/assets/jquery/jquery.min.js"></script> 
 <script src="assets/popper/popper.min.js"></script>  
 <script src="assets/tether/tether.min.js"></script>  
 <script src="assets/bootstrap/js/bootstrap.min.js"></script> 
  <script src="assets/smoothscroll/smooth-scroll.js"></script>  
  <script src="assets/parallax/jarallax.min.js"></script> 
   <script src="assets/dropdown/js/nav-dropdown.js"></script> 
    <script src="assets/dropdown/js/navbar-dropdown.js"></script> 
     <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script> 
      <script src="assets/theme/js/script.js"></script>  
  
  
</body>
</html>


