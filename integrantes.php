<div class="container" style="display: none;" id="mydiv3">
    <div class="thumbnail">
        <h1><p class="text-center"><span class="glyphicon glyphicon-comment"></span>
            <p class="text-center">INTEGRANTES</p></h1>
    </div>


    <div class="col-xs-12 center-block thumbnail">
        <div class="thumbnail">
            <h2><p class="text-center">Alunos</p></h2>
        </div>
        <div>
            <div class="row">
                <h3>
                <div class="col-sm-7 thumbnail">
                    <strong>Nome</strong>
                </div>
                <div class="col-sm-3 thumbnail">
                    <strong>Ano de Ingresso</strong>
                </div>
                <div class="col-sm-2 thumbnail">
                    <strong>Habilitação</strong>
                </div></h3>
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
                        <h4>
                        <div class="col-sm-7 ">
                            <?php echo $inT['nome']; ?>
                        </div>
                        <div class="col-sm-3 ">
                            <?php echo $inT['ano']; ?>
                        </div>
                        <div class="col-sm-2 ">
                            <?php echo $inT['habilit']; ?>
                        </div></h4>
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
    $categoria = array(1=>"Professor", 2=>"Coordenador");
    for($i=1;$i<=2;$i++) {

        ?>

        <div class="col-xs-12 center-block thumbnail">
            <div class="thumbnail">
                <h2><p class="text-center"><?php echo $categoria[$i]; ?></p></h2>
            </div>
            <div>
                <div class="row">
                    <h3>
                    <div class="col-sm-6 thumbnail">
                        <strong>Nome</strong>
                    </div>
                    <div class="col-sm-6 thumbnail">
                        <strong>E-mal</strong>
                    </div></h3>
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
                        <h4>
                        <div class="row">
                            <div class="col-sm-6 ">
                                <?php echo $inP['nome']; ?>
                            </div>
                            <div class="col-sm-6 ">
                                <?php echo $inP['email']; ?>
                            </div>
                        </div></h4>
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
