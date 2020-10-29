<!DOCTYPE HTML>
<html  >
<head>
  <!-- Site made with Mobirise Website Builder v5.2.0, https://mobirise.com -->
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
            <div class="col-12 col-lg-12">
                <h1 class="mbr-section-title mbr-fonts-style mb-3 display-4"><strong>

                    <!--faz a exclusão do dado pelo Cod do produto-->
                    <form action="editar_bd.php"  method="GET">
                            <div class="form-group">
                              <label>Digite na caixa abaixo o Cod_Produto que deseja editar</label>
                              <input name="Cod_Produto" type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Digite aqui">                                         
                            </div>                  
                            <button type="submit" class="btn btn-primary">Confirmar</button>
                      </form>


                       <!------------------------Lista os produtos da tela de update--------------------------->
                    <h2>Todos os produtos registrados</h2>
                      <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Cod_Produto</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Categoria</th>
                          </tr>
                        </thead>
                        <tbody>

                        <?php
                            //requerimento da clas e bd 
                            require_once('db.class.php'); 

                            //Nova instancia de banco de dados
                            $obj_db = new db();

                            //Cria conexão
                            $linkConect = $obj_db -> conecta_mysql();


                            //Query que busca todos os dados possivel para edição
                            $sql = "SELECT a.ID, a.nome, a.descricao, a.valor, b.Nome as fk_categoria FROM  tb_produtos as a
                                      inner join tb_categorias as b
                                      on a.fk_categoria = b.ID 
                                      ";

                            //executa a query
                            $result = mysqli_query($linkConect , $sql );

                            
                            //laço para pegar os dados do banco de dados arqmzerando em result
                            while($registrocategoria = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                
                           
                                      //busca variaveis pelo indice
                                      $idproduto = $registrocategoria['ID'];
                                   
                                      $Nomeproduto = $registrocategoria['nome'];
                                   
                                      $Drescproduto = $registrocategoria['descricao'];
                                   
                                      $Valorproduto = $registrocategoria['valor'];
                                   
                                      $Catproduto = $registrocategoria['fk_categoria'];

                                      $row = '"row"';

                                      //Escreve as linhas da tabela no thml buscando as variaveis no banco de dados
                                      print "
                                        <tr>
                                         <th scope= $row >$idproduto</th>
                                          <td>$Nomeproduto </td>
                                          <td>$Drescproduto</td>
                                          <td>$Valorproduto</td>
                                          <td>$Catproduto</td>
                                        </tr>
                                      "; 
                            }
                          ?>
                        </tbody>
                      </table>       
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

<section style="background-color: #fff; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif; color:#aaa; font-size:12px; padding: 0; align-items: center; display: flex;"><a href="" style="flex: 1 1; height: 3rem; padding-left: 1rem;"></a><p style="flex: 0 0 auto; margin:0; padding-right:1rem;"><a href="https://mobirise.site/h" style="color:#aaa;"></a> </p>
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

