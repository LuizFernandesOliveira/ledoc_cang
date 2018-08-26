<div class="center-block thumbnail" style="display: none;" id="div1">

    <!--=========================================================================================
                                   JANELA MODAL PARA ADICIONAR A MATRICULA
    ============================================================================================-->
    <div class="modal fade" id="adicionainscricao" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">INSIRA O NÚMERO DA MATRICULA</h4></div>
                <div class="modal-body">
                    <form class="form-group" action="includes/add_matricula.php" method="post">
                        <input type="text" class="form-control" name="inscricao">
                        <button type="submit" class="btn btn-block">Adicionar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--=========================================================================================
                                  FIM DA JANELA MODAL PARA ADICIONAR A MATRICULA
    ============================================================================================-->
    <!-- BOTÃO PARA ADICIONAR MATRICULA  -->
    <div class="">
        <div class="col-md-3">
            <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#adicionainscricao">
                <h4>Adicionar</h4>
            </button>
        </div>
    </div>
    <!-- FIM DO BOTÃO PARA ADICIONAR MATRICULA  -->
    <div class="col-md-12 center-block thumbnail">


        <div class="thumbnail">
            <h2><p class="text-center">Matriculas de administradores</p></h2>
        </div>


        <div class="col-md-12">
            <div class='row'>
                <?php
                $matri = $databaseConnection->makeQuery("SELECT * from ledoc_usuario ");

                if ($matri == null) {
                    echo "<p class='text-center'>Não há matriculas</p>";
                } else {
                    foreach ($matri as $mT) {
                        if ($mT['nome'] == "") {
                            echo "  <div class='col-md-3'>
                                        <div class='alert-danger'><h2>" . $mT['matricula'] . "</h2></div>
                                    </div>
                                    <div class='col-md-9'>
                                        <h2><div class='alert-danger' role='alert'>Ainda não se cadastrou</div></h2>
                                    </div><hr/>";
                        } else {
                            echo "  <div class='col-md-3'>
                                        <div class='alert-success'><h2>" . $mT['matricula'] . "</h2></div>
                                    </div>
                                    <div class='col-md-9'>
                                        <h2><div class='alert-success' role='alert'>".$mT['nome']."</div></h2>
                                    </div><hr/>";
                        }
                    }
                }
                ?>
            </div>
        </div>
        <form name="matriculas" action="includes/del_matricula.php" method="post" enctype="multipart/form-data">
            <div class="col-md-9">
                <input class="form-control" type="text" name="matricula" placeholder="Digite a matricula"/>
            </div>
            <div class="col-md-3 thumbnail">
                <button type="submit" class="btn-xs btn-danger">Excluir</button>
            </div>
        </form>


    </div>
</div>

<div class='col-md-12 center-block thumbnail' style="display: inline;" id="div2">
    <!--  BOTÃO PARA ADICIONA UMA POSTAGEM  -->

    <div class="col-md-3">
        <button type='button' class='btn btn-info btn-block' data-toggle='modal' data-target='#modal'
                data-whatever='@mdo'><h4>Nova postagem</h4>
        </button>
    </div>

    <!--  FIM DO BOTÃO PARA ADICIONA UMA POSTAGEM  -->

    <!--=========================================================================================
                            JANELA MODAL PARA POSTAR
    ============================================================================================-->
    <div class='modal fade' id='modal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'>
        <div class='modal-dialog modal-lg' role='document'>
            <div class='modal-content'>
                <div class='modal-body'>
                    <div class='thumbnail center-block'>
                        <div class='modal-header'>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span
                                        aria-hidden='true'>&times;</span></button>
                        </div>
                        <div class='modal-header'>
                            <h4 class='modal-title' id='exampleModalLabel'><a
                                        class='btn-success btn-block active disabled'><p class='text-center'>Formulario
                                        para a publicação
                                    <p></a></h4>
                        </div>
                    </div>
                    <div class='container-fluid'>
                        <div class='container-fluid bg-success'>
                            <form class='form' action='includes/add_news.php' method='post'
                                  enctype='multipart/form-data'>
                                <div class='thumbnail'>
                                    <a class='btn btn-info btn-block active disabled'>Adicione o Título da
                                        publicação</a>
                                    <input type='text' class='form-control' name='titulo'/>
                                </div>
                                <div class='thumbnail'>
                                    <a class='btn btn-info btn-block active disabled'>Adicione a imagem que aparecerá na
                                        publicação</a>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="file" class="input-label" style=""><h1><span
                                                            class="glyphicon glyphicon-upload"></span></h1>Selecionar
                                                imagem</label>
                                            <input type='file' id="file" class='form-control' name='img'
                                                   style="visibility: hidden;"/>
                                        </div>
                                        <div class="col-md-6">
                                            <img id="img" style="width: 300px;"/>
                                        </div>

                                    </div>
                                </div>
                                <script>
                                    $(function () {
                                        $('#file').change(function () {
                                            const fil = $(this)[0].files[0]
                                            const fileReader = new FileReader()
                                            fileReader.onloadend = function () {
                                                $('#img').attr('src', fileReader.result)
                                            }
                                            fileReader.readAsDataURL(fil)
                                        })
                                    })
                                </script>
                                <div class='thumbnail'>
                                    <a class='btn btn-info btn-block active disabled'>Adicione o texto da publicação</a>
                                    <textarea name='texto'></textarea>
                                    <script>
                                        CKEDITOR.replace('texto');
                                    </script>
                                </div>
                                <div>
                                    <input type='submit' class='btn btn-primary' name='dados_postagem'
                                           value='Publicar'/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====================================================================================
                                                FIM DA  JANELA MODAL PARA POSTAR
    ============================================================================================-->

    <div class='col-md-12 thumbnail'>
        <h3><p class='text-center'>Postagens da Página Inicial</p></h3>
    </div>
    <?php
    $matricula = $usuario['matricula'];
    $postagem = $databaseConnection->makeQuery("SELECT * from ledoc_postagem where num_matricula='$matricula' order by id DESC");

    if ($postagem == null) {
        echo "<p class='text-center'>Você Ainda não fez nenhuma postagem</p>";
    } else {
        foreach ($postagem as $pT) {

            $id = $pT['id'];
            $num_matricula = $pT['num_matricula'];
            $imagem = $pT['imagem'];
            $titulo = $pT['titulo'];
            $texto = $pT['texto'];
            $data = $pT['data'];

            echo "
    <!--Div base para surgir na pagina inicial quando o coordenador(a) fizer uma publicação-->
        <div class='radio'>
            <div class='col-md-12 col-lg-12 col-xs-12 col-sm-12 thumbnail'>
                <div class='media'>
                    <div class='media-left col-md-2 col-lg-2 col-sm-2 col-xs-2'>
                        <img src='perfil/" . $num_matricula . "/postagem" . $id . "/" . $imagem . "' class='media-object' style='width: 100px;'>
                    </div>
                    <div class='media-body'>
                        <h2 class='media-heading'>" . $titulo . "</h2>
                    </div>
                </div>
                <form name='excluirpost' action='includes/del_news.php' method='post' enctype='multipart/form-data'>
                    <button type='submit' class='btn-xs btn-danger' name='del_post' value='" . $id . "'>Excluir</button>
                </form>
            </div>
        </div>";
        }
    }
    ?>
    <!--Fim-->

</div>

<div class="col-md-12 thumbnail" style="display: none;" id="div3">
    <div class="">
        <!-- BOTÃO PARA ADICIONAR MATRICULA  -->

        <div class="col-md-3">
            <button type="button" class="btn btn-info btn-block" data-toggle="modal"
                    data-target="#adicionaintegrante"><h4>Adicionar</h4>
            </button>
        </div>

        <!-- FIM DO BOTÃO PARA ADICIONAR MATRICULA  -->
        <!--=========================================================================================
                                       JANELA MODAL PARA ADICIONAR UM INTEGRANTE
        ============================================================================================-->
        <div class="modal fade" id="adicionaintegrante" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">PREENCHA TODOS OS CAMPOS</h4></div>
                    <div class="modal-body">
                        <form class="form-group" action="includes/add_integrants.php" method="post">
                            <div class='form-group'>
                                <label for='sel1'>Selecione o tipo</label>
                                <select class='form-control' id='sel1' name='categoria'>
                                    <option value="">Selecione</option>
                                    <?php
                                    $integrante_cat = $databaseConnection->makeQuery("SELECT * from ledoc_integrante_categoria");
                                    if ($integrante_cat == null) {
                                    } else {
                                        foreach ($integrante_cat as $iT) {
                                            echo "<option value='" . $iT['id'] . "'>" . $iT['categoria'] . "(a)</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="sel1">Nome</label> <br>
                                <input type="text" name="nome" class="form-control">
                            </div>
                            <div class="form-group" id="email">
                                <label for="sel1">Email</label> <br>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group" id="ano">
                                <label for="sel1">Ano de ingresso</label>
                                <select class="form-control" id="sel1" name="ano">
                                    <option value="">Selecione</option>
                                    <?php

                                    for ($i = 2016; $i <= 2100; $i++) {
                                        echo "<option value='" . $i . "'>" . $i . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group" id="habilitacao">
                                <label for="sel1">Selecione a habilitação</label>
                                <div class="alert alert-danger" role="alert">Caso seja um professor(a) ou Coordenador(a)
                                    a ser integrado, por favor selecione a habilitação conforme a opção do mesmo. Este
                                    Dado nao será fornecido no site.
                                </div>
                                <select class="form-control" id="sel1" name="hab">
                                    <option value="">Selecione</option>
                                    <?php
                                    $habi = $databaseConnection->makeQuery("SELECT * from ledoc_habilitacao");
                                    if ($habi == null) {
                                    } else {
                                        foreach ($habi as $hB) {
                                            echo "
                                    <option value='" . $hB['id'] . "'>" . $hB['categoria'] . "</option>
                                ";
                                        }
                                    }
                                    ?>
                                </select>
                                <br>
                            </div>
                            <input type="submit" value="Cadastrar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--=========================================================================================
                                      FIM DA JANELA MODAL PARA ADICIONAR UM INTEGRANTE
        ============================================================================================-->
        <div class="col-xs-12 center-block thumbnail">
            <div class="thumbnail">
                <h3><p class="text-center">Alunos</p></h3>
            </div>
            <div>
                <div class="">
                    <div class="col-sm-8 thumbnail">
                        <strong>Nome</strong>
                    </div>
                    <div class="col-sm-2 thumbnail">
                        <strong>Ano</strong>
                    </div>
                    <div class="col-sm-2 thumbnail">
                        <strong>Habilitação</strong>
                    </div>
                </div>
            </div>
            <!--Div base para surgir na pagina inicial quando o coordenador(a) fizer uma publicação-->
            <?php
            $integranteA = $databaseConnection->makeQuery("SELECT a.id, a.nome, a.ano, a.id_habilitacao, b.categoria as habilit, d.categoria
FROM ledoc_integrante as a
INNER JOIN  ledoc_habilitacao as b 
ON a.id_habilitacao = b.id
INNER JOIN  ledoc_integrante_categoria as d 
ON a.id_categoria = d.id
WHERE d.categoria = 'Aluno'
order by a.ano
");
            if ($integranteA == null) {
            } else {
                foreach ($integranteA as $inT) {

                    ?>
                    <div>
                        <div class="row">
                            <div class="col-sm-8 ">
                                <?php echo $inT['nome']; ?>
                            </div>
                            <div class="col-sm-2 ">
                                <?php echo $inT['ano']; ?>
                            </div>
                            <div class="col-sm-2 ">
                                <?php echo $inT['habilit']; ?>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <!--Fim-->
                    <?php
                }
            }
            ?>
        </div>

        <?php
        $categoria = array(1 => "Professor", 2 => "Coordenador");
        for ($i = 1; $i <= 2; $i++) {

            ?>

            <div class="col-xs-12 center-block thumbnail">
                <div class="thumbnail">
                    <h3><p class="text-center"><?php echo $categoria[$i]; ?></p></h3>
                </div>
                <div>
                    <div class="">
                        <div class="col-sm-2 thumbnail">
                            <strong>Identificador</strong>
                        </div>
                        <div class="col-sm-5 thumbnail">
                            <strong>Nome</strong>
                        </div>
                        <div class="col-sm-5 thumbnail">
                            <strong>E-mal</strong>
                        </div>
                    </div>
                </div>
                <!--Div base para surgir na pagina inicial quando o coordenador(a) fizer uma publicação-->
                <?php
                $integranteP = $databaseConnection->makeQuery("SELECT x.id as id_b, x.id_categoria, x.nome, x.email, intec.categoria
FROM ledoc_integrante as x
INNER JOIN  ledoc_integrante_categoria as intec 
ON x.id_categoria = intec.id
WHERE intec.categoria = '$categoria[$i]'
order by id_b
");
                if ($integranteP == null) {
                } else {
                    foreach ($integranteP as $inP) {
                        ?>
                        <div>
                            <div class="row">
                                <div class="col-sm-2 ">
                                    <?php echo $inP['id_b']; ?>
                                </div>
                                <div class="col-sm-5 ">
                                    <?php echo $inP['nome']; ?>
                                </div>
                                <div class="col-sm-5 ">
                                    <?php echo $inP['email']; ?>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <!--Fim-->
                        <?php
                    }
                }
                ?>
                <!--Fim-->
            </div>
            <?php
        }
        ?>
    </div>

</div>
