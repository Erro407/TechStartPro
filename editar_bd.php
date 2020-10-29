<?php 
              
              //Recebe ID do produto a ser alterado 
              $codProduto = $_GET['Cod_Produto'];

  
                            //requerimento da clas e bd 
                            require_once('db.class.php'); 

                            //Nova instancia de banco de dados
                            $obj_db = new db();

                            //Cria conexão
                            $linkConect = $obj_db -> conecta_mysql();

                          //teste se as variaveis estão null

                            $sql = "SELECT a.ID, a.nome, a.descricao, a.valor, b.Nome as fk_categoria FROM  tb_produtos as a
                                      inner join tb_categorias as b
                                      on a.fk_categoria = b.ID 
                                      where a.id = $codProduto
                                      ";


                            $result = mysqli_query($linkConect , $sql );

                            
                            while($registrocategoria = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                
                           
                                      //busca variaveis que vão ser alteradas dentro do banco de dados para exibição no html
                                      $idproduto = $registrocategoria['ID'];
                                   
                                      $Nomeproduto = $registrocategoria['nome'];
                                   
                                      $Drescproduto = $registrocategoria['descricao'];
                                   
                                      $Valorproduto = $registrocategoria['valor'];
                                   
                                      $Catproduto = $registrocategoria['fk_categoria'];                                    
                            } 

?>


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
                    <form action="editar_bd_update.php"  method="GET">
                            <div class="form-group">
                         		 
                          	</div>

                          		<label>Codigo do produto</label>
                         		 <input  value =  <?php echo $idproduto; ?>  name="codProduto" type="text" class="form-control"  aria-describedby="emailHelp"  readonly>
              
                              <label>Nome</label>
                              <input  value =  "<?php echo $Nomeproduto; ?>"" name="nome" type="text" class="form-control"  aria-describedby="emailHelp" >                                         


                               <label>Descrição</label>
                              <input value =  "<?php echo $Drescproduto; ?> "   name="descricao" type="text" class="form-control"  aria-describedby="emailHelp"">                                         




                               <label>Valor</label>
                              <input value = <?php echo $Valorproduto; ?>   name="valor" type="text" class="form-control"  aria-describedby="emailHelp" >      



                              <div class="form-group col-md-12">
                      <label for="inputEstado">Categoria</label>
                           <select id="inputEstado" class="form-control" name="catproduct">
                                <option selected>Selecione uma categoria..</option>
                         
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
                            </div>                  
                            <button type="submit" class="btn btn-primary">Confirmar</button>
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



 