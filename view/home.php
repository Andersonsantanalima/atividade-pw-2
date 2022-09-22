<?php

require_once 'Upload.php';
require_once 'Conexao.php';
?>
    <fieldset>
        <legend>Usuarios</legend>
        <div class="card-columns">
            <?php
                $cmdSql = "SELECT usuario.*,imagem.link FROM usuario LEFT JOIN imagem ON usuario.email = imagem.fk_usuario_email GROUP BY usuario.email";
                $cxPronta = $cx->prepare($cmdSql); 
                if($cxPronta->execute()){
                    if($cxPronta->rowCount() > 0){
                        $usuario = $cxPronta->fetchAll(PDO::FETCH_OBJ);
                        foreach ($usuario as $usuario) {
                            echo'<div class="card">
                            <img class = "card-img-top" src="'.$usuario->link.'">
                            <div class = "card-body";>
                            <h5 class = "card-title">'.$usuario->nome.'</h5>
                            <a href="usuario_perfil" class="btn btn-primary">Ver perfil</a>
                            </div>
                         </div>';
                        }
                    }
                }
            ?>             
        </div>

    </fieldset>
