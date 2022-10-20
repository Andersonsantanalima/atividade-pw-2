<div class="card-columns mt-4">

            <?php
                $cmdSql = "SELECT usuario.*, imagem.link FROM usuario INNER JOIN imagem ON usuario.email = imagem.fk_usuario_email GROUP BY usuario.email;";
                $cxPronta = $cx->prepare($cmdSql); 
                if($cxPronta->execute()){
                    if($cxPronta->rowCount() > 0){
                        $usuarios = $cxPronta->fetchAll(PDO::FETCH_OBJ);
                        foreach ($usuarios as $usuario) {
                            echo'<a class="position-relative" href="?usuario='.$usuario->email.'">
                                <div class="card text-center pt-5 px-5">
                                    <img class="card-img-top " src="'.$usuario->link.'">
                                    <div class="card-body">
                                    <h5 class="card-title">'.$usuario->nome.'</h5>        
                                    </div>
                                </div>                            
                            </a>';
                            
                        }                        
                    }
                }
            ?>

<!-- //<nav>
//  <div class="nav nav-tabs" id="nav-tab" role="tablist">
 //   <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
//    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Perfil</a>
//    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contato</a>
//  </div>
//</nav>
//<div class="tab-content" id="nav-tabContent">
 // <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">...</div>
 // <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
 // <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
//</div></div> -->