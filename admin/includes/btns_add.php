<div class="row">
    <?php
        if ($tam == 7) {
            echo "
            <div class='col-md-4 thumbnail'>
        <div class='col-md-12'>
            <button type='button' class='btn btn-success btn-block'
            
            ";

            ?>
            onclick="mostraDiv('1', n_divs)"><h4>matriculas</h4>
            <?php
            echo "
        </button>
        </div>
    </div>
        ";
        }
    ?>
    <div class='col-md-4 thumbnail'>
        <div class='col-md-12'>
            <button type='button' class='btn btn-success btn-block' onclick="mostraDiv('2', n_divs)"><h4>Postagens</h4>
            </button>
        </div>
    </div>
    <div class="col-md-4 thumbnail">
        <div class="col-md-12">
            <button type="button" class="btn btn-success btn-block" onclick="mostraDiv('3', n_divs)"><h4>Integrantes</h4>
            </button>
        </div>
    </div>

</div>
<script>
    //Quantidade de itens
    n_divs = '3'
</script>
