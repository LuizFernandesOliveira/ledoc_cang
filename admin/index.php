<?php
require "../php/banco_dados/DatabaseConnection.php";
require "../php/utilitarios/Utils.php";
require "../php/session/inicia_sessao.php";

$databaseConnection = new DatabaseConnection();

$usuario = $_SESSION["usuario"];
$tam = strlen($usuario['matricula']);
$categotia = $usuario['usuario_categoria'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Licenciatura em Educação do Campo - IFRN/ Campus Canguaretama</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Almendra SC' rel='stylesheet'>
    <script src="../ckeditor/ckeditor.js"></script>
    <script>
        c = 0;
        du = "";

        function mostraDiv(dv, n) {
            for (i = 1; i <= n; i++) {
                if (i == dv) {
                    if (du != dv) {
                        document.getElementById('div' + i).style.display = "inline";
                        du = dv;
                    } else {
                        du = "";
                        document.getElementById('div' + i).style.display = "none";
                    }
                } else {
                    document.getElementById('div' + i).style.display = "none"
                }
            }
        }

    </script>
</head>
<body class="bg-info">
<div class="container-fluid text-center bg-info">

    <div class="radio">
        <div class="row">
            <a href="../index.php"><img class="img-responsive" id="" src="../img/BG02.png" style="width:100%"></a>
        </div>
    </div>

    <div class="text-center bg-info">
        <div class="col-md-3">
            <div class="thumbnail">
                <div class="container-fluid">
                    <div class="row profile">
                        <div class="col-md-12">
                            <div class="profile-sidebar">
                                <div class="profile-userpic">


                                    <!--===========================================
                                    Modal PARA ALTERAR A SENHA
                                    ============================================-->
                                    <div class="modal fade" id="myModalalterasenhacoo" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;
                                                    </button>
                                                    <h4 class="modal-title">Alterar senha</h4></div>
                                                <form action="alterasenha.php" method="post"
                                                      enctype="multipart/form-data">
                                                    <label>Digite a senha atual<input type="password"
                                                                                      class="form-control"
                                                                                      name="senha"/></label>
                                                    <label>Digite a nova senha<input type="password"
                                                                                     class="form-control"
                                                                                     name="novasenha"/></label>
                                                    <label>Redigite a nova senha<input type="password"
                                                                                       class="form-control"
                                                                                       name="repetenovasenha"/></label><br/>
                                                    <input type="submit" value="Mudar senha"/>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--======================================
                                    FIM DO Modal PARA ALTERAR A SENHA
                                    ========================================-->

                                    <!--===========================================
                                    Modal PARA ALTERAR COORDENADOR GERAL
                                    ============================================-->
                                    <div class="modal fade" id="myModalalteracoo" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;
                                                    </button>
                                                    <h4 class="modal-title">Alterar senha</h4></div>
                                                <form action="includes/muda_coodenador.php" method="post" enctype="multipart/form-data">
                                                    <label>Digite a MATRICULA do novo Coordenador<input type="number" class="form-control"
                                                                                     name="matricula"/></label>
                                                    <input type="submit" value="Mudar Coordenador"/>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--======================================
                                    FIM DO Modal PARA ALTERAR COORDENADOR GERAL
                                    ========================================-->
                                </div>

                                <div class="profile-usertitle thumbnail">
                                    <div class="col-md-12"><img
                                                src="<?php echo "perfil/" . $usuario['matricula'] . "/perfil.jpg"; ?>"
                                                class='img-circle' style='width: 30%;' id="foto_perfil" alt=''></div>
                                    <div class="profile-usertitle-name"><h2><?php echo $usuario['nome']; ?></h2></div>
                                </div>
                                <div class="profile-usermenu">
                                    <ul class="nav">
                                        <a href="../index.php">
                                            <button type="button" class="btn btn-block btn-info"><h4>Página Inicial</h4></button>
                                        </a>
                                        <button type="button" class="btn btn-block btn-info" data-toggle="modal"
                                                data-target="#myModalalterasenhacoo"><h4>Alterar senha</h4>
                                        </button>
                                        <?php if ($tam == 7 && $categotia == "Coordenador") {
                                            echo "<button type='button' class='btn btn-block btn-info' data-toggle='modal' data-target='#myModalalteracoo'><h4>Mudar Coordenador Geral</h4></button>";
                                        } ?>
                                        <a href="../php/cadastro_login/logout.php">
                                            <button type="button" class="btn btn-block btn-danger"><h4>Sair</h4></button>
                                        </a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 thumbnail">
            <?php

            include "includes/btns_add.php";
            include "includes/paginas_para_btns.php";


            ?>
        </div>
    </div>
</div>
<script>
    //Quantidade de itens
    n_divs = '3'
</script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTw1AQgxVSNgt4=" crossorigin="anonymous"></script>
</body>
</html>

