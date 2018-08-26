
<div class="thumbnail">
    <div class="container-fluid">
        <div class="row profile">
            <div class="col-md-12">
                <div class="profile-sidebar">
                    <div class="profile-userpic">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <img src='<?php echo "admin/perfil/".$usuario['matricula']."/perfil.jpg"; ?>' class='img-circle' style='width: 30%;' id="foto_perfil" alt=''>
                        </div>
                    </div>
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">
                            <p class="h2"><?php echo $usuario['nome'];?></p>
                        </div>
                    </div>
                    <div class="profile-usermenu">
                        <ul class="nav">
                            <li class="active">

                                <a href="admin/index.php" "><button type="button" class="btn btn-block"><h3>Voltar para área administrativa</h3></button></a>

                            </li>
                        </ul>
                    </div>
                    <!-- END MENU -->
                </div>
            </div>
        </div>
    </div>

</div>