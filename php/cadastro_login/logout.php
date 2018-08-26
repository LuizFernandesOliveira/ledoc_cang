<?php

require "../session/inicia_sessao.php";
session_destroy();
session_unset();
header('location:../../index.php');

?>