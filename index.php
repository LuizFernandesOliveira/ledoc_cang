<?php
require "php/session/inicia_sessao.php";
require "php/banco_dados/DatabaseConnection.php";

if (isset($_SESSION["usuario"])) {
    $usuario = $_SESSION["usuario"];
}
$databaseConnection = new DatabaseConnection();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Licenciatura em Educação do Campo - IFRN/ Campus Canguaretama</title>
    <link rel="shortcut icon" href="img/favicon/favicon.ico">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Almendra SC' rel='stylesheet'>
    <style>@import url('https://fonts.googleapis.com/css?family=Playfair+Display|Ropa+Sans');</style>
    <script language="javascript">
        c = 0;
        du = "";

        function mostraLogin() {
            if (document.getElementById('div').style.display === "none") {
                document.getElementById('div').style.display = "inline";
            } else {
                document.getElementById('div').style.display = "none";
            }
        }

        function trocaMenu(dv, n) {
            for (i = 1; i <= n; i++) {
                if (i == dv) {
                    if (du != dv) {
                        document.getElementById('mydiv' + i).style.display = "inline";
                        du = dv;
                    } else {
                        du = "";
                        document.getElementById('mydiv' + i).style.display = "none";
                    }
                } else {
                    document.getElementById('mydiv' + i).style.display = "none"
                }
            }
        }

        c = 0;
        du = "";

        function mCD(dv, n) {
            //resto da divisão de dv por 6
            var rd = dv%6;
            if(n<=6){
                a = n;
                b = 1;
            }else if(n>6 && dv>=(n-5)){
                a = n;
                b = a-5;
            } else if(n>6 && dv<(n-5)){
                b = dv - (rd+1);
                a = b + 5;
            }
            for (i = b; i <= a; i++) {
                if (i == dv) {
                    if (du != dv) {
                        document.getElementById('contD' + i).style.display = "inline";
                        document.getElementById('input_m' + i).value = "Menos";
                        du = dv;
                    }
                    else {
                        du = "";
                        document.getElementById('contD' + i).style.display = "none";
                        document.getElementById('input_m' + i).value = "Mais";
                    }
                } else {
                    document.getElementById('contD' + i).style.display = "none";
                    document.getElementById('input_m' + i).value = "Mais";
                }
            }
        }
    </script>
</head>

<body class="bg-info">

<div class="container-fluid text-center bg-info">
    <!--   style="margin: -9px 4%;box-shadow: 0px 0px 20px rgba(0,0,0,.6);"   -->
    <div class="text-center bg-info" id="top">
        <!--========================= ADCIONANDO MENU SUPERIOR ============================-->
        <div class="bg-info ">
            <div class="row" style="background-color: white;">
                <a href="index.php"><img class="img-responsive" id="" src="img/icon_siteledoc.png"
                                         style="width: 700px; margin: 0px auto;"></a>
            </div>
        </div>
        <!--====================== FIM DO MENU SUPERIOR ===============================-->


        <div class="row">
            <div class="col-xs-12 center-block">
                <!--=======================ADCIONANDO MENU LATERAL ===================================-->
                <div class="col-md-12 center-block thumbnail">
                    <div class="col-md-2">
                        <?php
                        if (isset($usuario['matricula'])) {
                            echo "<a href='admin/index.php'><button type='button' class='btn btn-block btn-success'><h4>Voltar para área administrativa</h4></button></a>";
                        } else {
                            include "admin/login.php";}
                        ?>
                    </div>
                    <?php
                    /*Array dos menus*/
                    $menu = array(1 => "PÁGINA INICIAL", 2 => "DOCUMENTOS", 3 => "INTEGRANTES", 4 => "CONHEÇA O CURSO", 5 => "MAIS", 6 => "LEDOC COMUNICA");
                    for ($i = 1; $i <= 6; $i++) {
                        ?>
                        <div class="col-md-2">
                            <div class='row'>
                                <button class="btn btn-primary btn-block dropdown-toggle" type="button"
                                        onclick="trocaMenu('<?php echo $i; ?>', numero_div)"><h4><?php echo $menu[$i]; ?></h4>
                                </button>
                            </div>
                        </div>
                        <?php } ?>
                </div>
                <!--=======================AND===================================-->


                <div class="center-block bg-info" id="div" style="display:none">
                    <div class="col-md-3 col-sm-12 col-xs-12 center-block thumbnail">
                        <form class="login-form" action="php/cadastro_login/login.php" method="POST">
                            <div class="login-wrap" id="um" class="itens_menu">
                                <div class="container_login">
                                    <div class="" style="height: 52px;">
                                        <div class="input-group">
                                        <span class="input-group-addon"><span
                                                    class="glyphicon glyphicon-user"></span></i></span>
                                            <input type="text" class="form-control" placeholder="Matricula"
                                                   name="matricula"
                                                   autofocus style="height: 50px;">
                                        </div>
                                    </div>

                                    <div class="" style="height: 52px;">
                                        <div class="input-group">
                                        <span class="input-group-addon"><span
                                                    class="glyphicon glyphicon-lock"></span></span>
                                            <input type="password" class="form-control" placeholder="Senha" name="senha"
                                                   style="height: 50px;">
                                        </div>
                                    </div>
                                    <button class="btn-success btn-block btn-lg" type="submit">Acessar</button>
                                </div>
                            </div>
                        </form>
                        <button type="button" class="btn-success btn-block btn-lg" data-toggle="modal"
                                data-target="#myModalcadastro">Cadastrar
                        </button>
                    </div>
                </div>
                <!--====================== FIM DO MENU LATERAL =======================-->

                <!--======================== ADICIONANDO JANELA MODAL PARA CADASTRO ==========================-->
                <!--================================ JANELA MODAL PARA CADASTRO DO ADMINISTRADOR ======================================-->
                <div class="modal fade" id="myModalcadastro" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="thumbnail center-block">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="exampleModalLabel">Área de cadastro</h4>
                                </div>
                                <div class="modal-header">
                                    <div class="">
                                        <h4 class="bg-danger" id="exampleModalLabel">Atenção: </h4>
                                    </div>
                                    <div class="">
                                        <h6 class="" id="exampleModalLabel">O cadastro é restrito para pessoas
                                            autorizadas
                                            pela instituição, caso não tenha autorização, não tente efetuá-lo.</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-body">
                                <form action="php/cadastro_login/cadastro.php" method="post">
                                    <div class="container-fluid thumbnail">
                                        <div class="col-md-2 radio"><strong>Nome:</strong></div>
                                        <div class="col-md-10"><input type="text" class="form-control" name="nome">
                                        </div>
                                    </div>
                                    <div class="container-fluid thumbnail">
                                        <div class="col-md-2 radio">E-mail:</div>
                                        <div class="col-md-10"><input type="email" class="form-control" name="email">
                                        </div>
                                    </div>
                                    <div class="container-fluid thumbnail">
                                        <div class="col-md-2 radio">Matricula:</div>
                                        <div class="col-md-10"><input type="text" class="form-control" name="matricula">
                                        </div>
                                    </div>
                                    <div class="container-fluid thumbnail">
                                        <div class="col-md-2 radio">Categoria:</div>
                                        <div class="col-md-10">
                                            <?php
                                            //LISTANDO AS CATEGORIAS USUARIO
                                            $categoria = $databaseConnection->makeQuery("SELECT * from ledoc_integrante_categoria;");
                                            if ($categoria == null) {
                                                echo "<p class='text-center' style='color: red'>Erro</p>";
                                            } else {
                                                foreach ($categoria as $cT) {
                                                    echo "<div class='col-md-4'>" . $cT['categoria'] . "<input type='radio' class='form-control' name='categoria' value=" . $cT['id'] . "></div>";
                                                }

                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="container-fluid thumbnail">
                                        <div class="col-md-2 radio">Senha:</div>
                                        <div class="col-md-10"><input type="password" class="form-control" name="senha">
                                        </div>
                                    </div>
                                    <div class="container-fluid thumbnail">
                                        <div class="col-md-2 radio">Repita a senha:</div>
                                        <div class="col-md-10"><input type="password" class="form-control"
                                                                      name="resenha">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--======================== FIM DA JANELA MODAL =======================-->

                <!--==================== FIM DA JANELA MODAL PARA CADASTRO ==============================-->

            </div>
        </div>
    </div>


    <div class="container" style="display: inline;" id="mydiv1">
        <div class="thumbnail">
            <h1><p class="text-center"><span class="glyphicon glyphicon-dashboard"></span>
                <p class="text-center">NOTÍCIAS</p></h1>
        </div>


        <div class="show container">
            <?php
            $itens_por_pagina = 6;
            $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 0;
            $pag = $pagina;
            if ($pagina > 0) {
                $pagina = ($pagina * 6);
            } else {
                $pagina = 0;
            }
            $postagem = $databaseConnection->makeQuery("SELECT * from ledoc_postagem order by id desc LIMIT $pagina, $itens_por_pagina;");
            $num_total = $databaseConnection->makeQuery("SELECT max(id) as cont from ledoc_postagem;");
            foreach ($num_total as $num) {
                $num_total = $num['cont'];
            }
            $num_paginas = ceil($num_total / $itens_por_pagina);

            if ($postagem == null) {
                echo "<p class='text-center'>Em breve...</p>";
            } else {
                foreach ($postagem as $pT) {
                    $nID = $pT['id'];
                    $num_matricula = $pT['num_matricula'];
                    $imagem = $pT['imagem'];
                    $titulo = $pT['titulo'];
                    $texto = $pT['texto'];
                    $data = $pT['data'];
                    $matricula = $databaseConnection->makeQuery("SELECT * from ledoc_usuario where matricula = '$num_matricula';");
                    echo "<div class='col-md-12 thumbnail' id='documentario'>
                                    <div class='row no-gutters'>
                                        <div class='col-md-3' style='margin: auto 0px auto 0px;'>
                                            <hr/>
                                            <img src='admin/perfil/" . $num_matricula . "/postagem" . $nID . "/" . $imagem . "' style='width: 250px;'>
                                        </div>
                                        <div class='col-md-9'>
                                            <hr/>
                                            <h1>" . $titulo . "</h1>
                                            <br/>
                                            <p class='lead mb-0 text-left'>Postado por: " . $matricula[0]['nome'] . "</p>
                                            <p class='lead mb-0 text-right'>Em: " . $data . "</p>
                                            <p class='lead mb-0 text-right'>";

                    echo "<input type='button' value='Mais' class='btn btn-sm btn-danger' id='input_m" . $nID . "' onclick=\"mCD('" . $nID . "',n_dv)\">";
                    echo "      </p>
                                        </div>
                                    </div>
                                    <!-- ======== DIV DOS CONNTEUDOS DO DOCUMENTÁRIO ========= -->
                                    <div class='row no-gutters' id='contD" . $nID . "' style='display: none;'>
                                        <div class='col-lg-12'>
                                            <h3>" . $texto . "</h3>
                                        </div>
                                    </div>
                                    <!-- ===== AND DIV =====-->
                                    <hr/>
                                </div>";
                }
            }

            ?>
            <nav aria-label="Page navigation">

                <ul class="pagination">
                    <li>
                        <a aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>
                    </li>
                    <?php
                    for ($i = 1; $i <= $num_paginas; $i++) {
                        $estilo = "";

                        if ($pag == $i - 1) {
                            $v = $i - 1;
                            $estilo = "class=\"active\"";
                        }
                        ?>
                        <li <?php echo $estilo; ?>><a
                                    href="index.php?pagina=<?php echo $i - 1; ?>"><?php echo $i; ?></a></li>
                        <?php
                    }
                    ?>
                    <li>
                        <a aria-label="Next"><span aria-hidden="true">&raquo;</span></a>
                    </li>
                </ul>
            </nav>

            <script>
                //Quantidade de itens
                n_dv = '<?php echo $postagem[0]['id']; ?>'
            </script>


        </div>
    </div>
    <?php
    include "documentos.php";
    include "integrantes.php";
    include "sobre.php";
    include "mais.php";
    ?>

</div>

</div>
<div class="container-fluid" style="background-color: orange; ">
    <div class="radio">
        <div class="row">
            <a href="index.php"><img class="img-responsive" id="" src="img/BG02.png" style="width:100%"></a>
        </div>
    </div>
    <div class="row col-md-12 col-sm-12 col-xs-12 col-lg-12 center-block">
        <div class="modal-footer">

            <div class="row">
                <div class="col-md-3">

                </div>
                <div class="col-md-3">
                    <h4>
                        <p class="text-center" style="padding: 2px;"><strong>Licenciatura em Educação do Campo -
                                LEDOC</strong></p>
                        <p class="text-center"><strong><span class="glyphicon glyphicon-tags"></span></strong> Campus
                            Canguaretama / IFRN - BR-101, Km 160. S/N. - Areia Branca, Canguaretama - RN, 59190-000.</p>
                        <p class="text-center"><strong></strong></p>
                        <p class="text-center"><strong><span class="glyphicon glyphicon-earphone"></span></strong></p>
                        <p class="text-center"><strong><span class="glyphicon glyphicon-envelope"></span></strong></p>
                    </h4>
                </div>
                <div class="col-md-3">
                    <h4>
                        <p class="text-center" style="padding: 2px;"><strong>Contribuições da LEDOC</strong></p>
                        <p class="text-center"><a href="http://www2.ifrn.edu.br/leiai/Luiz/ed.docampoempauta/"
                                                  target="_blank"><img src="img/ledoc.jornal_LOGO_FINAL.png"
                                                                       style="width: 50px;">Educação do Campo em
                                Pauta</a></p>
                    </h4>
                </div>
                <div class="col-md-3">
                    <h4>
                        <p class="text-center" style="padding: 2px;"><strong>Desenvolvedores</strong></p>
                        <strong>Luiz Fernandes de Oliveira</strong>
                        <p class="text-right"><span class="glyphicon glyphicon-envelope"></span>
                            luiz.fernades@academico.ifrn.edu.br</p>
                        <strong>Gilmar Lima</strong>
                        <p class="text-right"><span class="glyphicon glyphicon-envelope"></span>
                            gilmar.lima@academico.ifrn.edu.br</p>
                    </h4>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    //Quantidade de itens
    n_divs = '1'
</script>

<script>
    //Quantidade de itens
    numero_div = '5'
</script>
</body>
</html>
