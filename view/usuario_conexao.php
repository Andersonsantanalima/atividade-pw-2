<div class="container">
    <fieldset>
        <h5><?php echo $_GET['nome']?></h5>
        <div class="card-columns">            
        <?php
            $cmdSql = "SELECT * FROM imagem WHERE imagem.fk_usuario_email = :email";
            $cxPronta = $cx->prepare($cmdSql); 
            if($cxPronta->execute([':email'=>$_GET['usuario_perfil']])){
                if($cxPronta->rowCount() > 0){
                    $foto = $cxPronta->fetchAll(PDO::FETCH_OBJ);
                    foreach ($foto as $foto) {
                        echo '<div class="card">
                        <img src="'.$foto->link.'" class="card-img-top">
                      </div>';
                    }
                }
            }
        ?>
        </div>
    </fieldset>
</div>