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
    <script src="js/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Almendra SC' rel='stylesheet'>
    <style>@import url('https://fonts.googleapis.com/css?family=Playfair+Display|Ropa+Sans');</style>
    <script language="javascript">
        c=0;
        du="";
        function escondediv(dv,n) {
            for (i = 1; i <= n; i++) {
                if (i == dv) {
                    if (du != dv) {
                        document.getElementById('mdiv' + i).style.display = "inline";
                        du = dv;
                    } else {
                        du = "";
                        document.getElementById('mdiv' + i).style.display = "none";
                    }
                }else {document.getElementById('mdiv' + i).style.display = "none"}
            }
            classe = document.getElementById('menu_responsivo').className;
            if (classe == 'col-md-9 col-sm-12 col-xs-12 col-lg-9 center-block') {
                document.getElementById('menu_responsivo').className = 'col-md-6 col-sm-12 col-xs-12 col-lg-6 center-block';
            }else {document.getElementById('menu_responsivo').className = 'col-md-9 col-sm-12 col-xs-12 col-lg-9 center-block';}
        }
    </script>
</head>

<body class="bg-info">
<div class="container-fluid text-center bg-info">
    <div class="container-fluid text-center bg-info" style="margin: -9px 4%;box-shadow: 0px 0px 20px rgba(0,0,0,.6);">
        <!--========================= ADCIONANDO MENU SUPERIOR ============================-->
        <div class="bg-info ">
            <div class="radio">
                <div class="row">
                    <a href="index.php"><img class="img-responsive" id="" src="img/BG02.png" style="width:100%"></a>
                </div>
            </div>
        </div>
        <!--====================== FIM DO MENU SUPERIOR ===============================-->
        <h4>
        <div class="container thumbnail">
            <h1><p class="text-center">DESENVOLVEDORES</p></h1>
            <div class="container-fluid text-center bg-info">
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 center-block thumbnail">
                    <div class="radio">
                        <div class="thumbnail col-md-12">
                            <div class="media">
                                <div class="media-left col-md-3 col-lg-3 col-sm-3 col-xs-3">
                                    <img src="img/equipe/luiz.jpg" class="media-object" style="width:130px;">
                                </div>
                                <div class="media-body">
                                    <h1>Luiz Fernandes de Oliveira</h1>
                                    <p class="text-center"><strong>E-mail: luiz.fernandes@academico.ifrn.edu.br</strong></p>
                                    <p class="text-center"><strong>WhatsApp: (84) 98119-5936</strong></p>
                                    <p class="text-center"><strong>Curriculo Lattes: </strong><a href="http://lattes.cnpq.br/3830771163451285" target="_blank">http://lattes.cnpq.br/3830771163451285</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="radio">
                        <div class="thumbnail col-md-12">
                            <div class="media">
                                <div class="media-left col-md-3 col-lg-3 col-sm-3 col-xs-3">
                                    <img src="img/equipe/gilmar.jpeg" class="media-object" style="width:130px">
                                </div>
                                <div class="media-body">
                                    <h1>Gilmar Lima</h1>
                                    <p class="text-center"><strong>E-mail: gilmar.lima@academico.ifrn.edu.br</strong></p>
                                    <p class="text-center"><strong>WhatsApp: (84) 98137-7782</strong></p>
                                    <p class="text-center"><strong>Curriculo Lattes: </strong><a href="http://lattes.cnpq.br/8407113239058393" target="_blank">http://lattes.cnpq.br/8407113239058393</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </h4>

    </div>

</div>

<script>
    //Quantidade de itens
    n_divs='1'
</script>
</body>
</html>
