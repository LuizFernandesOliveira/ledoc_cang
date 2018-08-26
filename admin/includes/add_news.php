<?php
require "../../php/banco_dados/DatabaseConnection.php";
require "../../php/utilitarios/Utils.php";
require "../../php/session/inicia_sessao.php";


$databaseConnection = new DatabaseConnection();

$titulo = $_POST['titulo'];
$texto = $_POST['texto'];
$usuario = $_SESSION["usuario"];
$matricula = $usuario['matricula'];
$data = date("Y-m-d");
$file = $_FILES['img'];


if (Utils::verificaCampoVazio($matricula, $titulo, $texto, $file)) {


    $name = $file['name'];

    $extensao = @end(explode('.', $name));
    $novoNome = rand() . ".$extensao";
    $tmp = $file['tmp_name'];
    $nIDPost = $databaseConnection->makeQuery("SELECT max(id) as id FROM ledoc_postagem; ");
    if ($nIDPost[0]['id'] == null) {
        $id = 1;
    }else {
        $id = $nIDPost[0]['id'];
        $id++;
    }

    if (!file_exists("../perfil/" . $matricula . "/postagem" . $id)) {
        mkdir("../perfil/" . $matricula . "/postagem" . $id, 0777);
        move_uploaded_file($tmp, "../perfil/" . $matricula . "/postagem" . $id . "/" . $novoNome);
    }

    $publica = $databaseConnection->atualizaBancoDados("INSERT INTO ledoc_postagem(id, num_matricula, titulo, imagem, texto, data) VALUE ('$id','$matricula', '$titulo', '$novoNome', '$texto','$data')");
    if ($publica) {
        echo "<script>alert('Publicado com sucesso!');window.history.go(-1);</script>";
    } else {
        echo "<script>alert('Erro!');window.history.go(-1);</script>";
    }

} else {
    echo "<script>alert('Preencha todos os campos!');window.history.go(-1);</script>";
}

?>

<?php
/***
 * require "../../php/banco_dados/DatabaseConnection.php";
 * require "../../php/utilitarios/Utils.php";
 * require "../../php/inicia_sessao.php";
 *
 *
 *
 * $databaseConnection = new DatabaseConnection();
 *
 * $titulo = $_POST['titulo'];
 * $texto = $_POST['texto'];
 * $usuario = $_SESSION["usuario"];
 * $matricula = $usuario['matricula'];
 * $data = date("Y-m-d");
 * $file = $_FILES['img'];
 *
 *
 * if (Utils::verificaCampoVazio($matricula, $titulo, $texto, $file)) {
 *
 *
 * //INFO IMAGEM
 * $numFile = count(array_filter($file['name']));
 * //PASTA
 * $folder = "perfil/" . $matricula . "/postagem";
 * //REQUISITOS
 * $permite = array('image/jpeg', 'image/png');
 * $maxSize = 1024 * 1024 * 5;
 * //MENSAGENS
 * $msg = array();
 * $errorMsg = array(
 * 1 => 'O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini.',
 * 2 => 'O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formulário HTML',
 * 3 => 'o upload do arquivo foi feito parcialmente',
 * 4 => 'Não foi feito o upload do arquivo'
 * );
 * if ($numFile <= 0)
 * echo 'Selecione uma Imagem!';
 * else {
 * for ($i = 0; $i < $numFile; $i++) {
 * $name = $file['name'][$i];
 * $type = $file['type'][$i];
 * $size = $file['size'][$i];
 * $error = $file['error'][$i];
 * $tmp = $file['tmp_name'][$i];
 *
 *
 * $extensao = @end(explode('.', $name));
 * $novoNome = rand() . ".$extensao";
 *
 * $postagem = $databaseConnection->atualizaBancoDados("SELECT id from postagem order by id desc limit 1");
 *
 * if ($postagem) {
 * $id = $postagem + 1;
 * }
 *
 * if (!file_exists("../perfil/" . $matricula . "/postagem" . $id)) {
 * mkdir("../perfil/" . $matricula . "/postagem" . $id, 0777);
 * move_uploaded_file($tmp, "../perfil/" . $matricula . "/postagem" . $id . "/" . $novoNome);
 * }
 *
 * if ($error != 0)
 * $msg[] = "<b>$name :</b> " . $errorMsg[$error];
 * else if (!in_array($type, $permite))
 * $msg[] = "<b>$name :</b> Erro imagem não suportada!";
 * else if ($size > $maxSize)
 * $msg[] = "<b>$name :</b> Erro imagem ultrapassa o limite de 5MB";
 * else {
 *
 * if (move_uploaded_file($tmp, "../perfil/" . $matricula . "/postagem" . $id . "/" . $novoNome)) {
 * $msg[] = "<b>$name :</b> Upload Realizado com Sucesso!";
 * } else {
 * $msg[] = "<b>$name :</b> Desculpe! Ocorreu um erro...";
 * }
 * }
 * foreach ($msg as $pop){
 * echo "<script>alert(".$pop.");</script>";
 * }
 * }
 * }
 * $publica = $databaseConnection->atualizaBancoDados("INSERT INTO postagem(num_matricula, titulo, imagem, texto, data) VALUE ('$matricula', '$titulo', '$file', '$texto','$data')");
 * if ($publica) {
 * echo "<script>alert('Publicado com sucesso!');window.history.go(-1);</script>";
 * } else {
 * echo "<script>alert('Erro!');window.history.go(-1);</script>";
 * }
 *
 *
 * } else {
 * echo "<script>alert('Preencha todos os campos!');window.history.go(-1);</script>";
 * }
 **/
?>
