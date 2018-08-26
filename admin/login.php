<div class='row'>
    <?php
    @$v = $_GET['valor'];
    if($v == true){echo "<span style='color: red;'>Todos os campos devem ser preenchidos</span>";}
    ?>
    <button class="btn btn-block btn-success" onclick="mostraLogin()"><h4>ACESSO RESTRITO</h4></button>
</div>
