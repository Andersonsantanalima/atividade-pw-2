<?php
$usuario = $_SESSION['user_logado'];
require_once 'Upload.php';
require_once 'Conexao.php';
if(isset($_POST['btnImg'])){
    $up = new Upload($_FILES['foto'],'img/');
    $url_img = $up->salvarImagem();

    $cmdSql = "INSERT INTO imagem(link, fk_usuario_email) VALUES (:url_img, :email)";
    $dados = [
        ':email' => $usuario->email,
        ':url_img' => $url_img
    ];
    $cxPronta = $cx->prepare($cmdSql); 
    if($cxPronta->execute($dados)){
        echo'<div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Cadastro</h4>
            <p>Imagem cadastrada com sucesso</p>
        </div>';
    }
    else{
        echo'<div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Cadastro</h4>
            <p>Erro ao cadastrar imagem</p>
        </div>';
    }     
        
}

?>
<div class="container">
    <h2>Seja bem vindo: <?php echo $usuario->nome; ?></h2>

    <form method="POST" class="form-inline" enctype="multipart/form-data"> 
        <input type="file" class="form-control" name="foto" >            
        <button type="submit" name="btnImg" class="btn btn-primary form-control">Enviar IMG</button>
    </form>

    <fieldset>
        <legend>Minha fotos</legend>
        <div class="card-columns">
            <?php
                $cmdSql = "SELECT * FROM imagem WHERE imagem.fk_usuario_email = :email";
                $cxPronta = $cx->prepare($cmdSql); 
                if($cxPronta->execute([':email'=>$usuario->email])){
                    if($cxPronta->rowCount() > 0){
                        $fotos = $cxPronta->fetchAll(PDO::FETCH_OBJ);
                        foreach ($fotos as $foto) {
                            echo'<div class="card">
                                    <img class="card-img-top" src="'.$foto->link.'">                
                                </div>';
                        }
                    }
                }
            ?>             
        </div>

    </fieldset>
</div>