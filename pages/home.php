

<section class="banner-container">
        

        
    <?php
        $slides = MySql::conectar()->prepare("SELECT * FROM `tb_admin.slide`");
        $slides->execute();
        $slides = $slides->fetchAll();
        
        foreach ($slides as $key => $value) {
    ?>

    <div style="background-image: url('<?php echo INCLUDE_PATH_PAINEL; ?>uploads/<?php echo $value['slide']; ?>');" class="banner-single"></div><!--banner-single-->

    <?php } ?>
        
    

            <div class="overlay"></div>
            <div class="center">
           <!--
            <form method="post">
                <h2>Qual seu melhor e-mail?</h2>
                <input type="email" name="email" require/>
                <input type="hidden" name="identificador" value="form_home" />
                <input type="submit" name="acao" value="Cadastrar!"/>
            </form>
            </div> center -->
            
            <div class="bullets"></div><!-- bullets -->

</section><!-- banner principal -->
        <section class="autor">
            <div class="center">
            <div class="w50 left">
                <h2><?php echo $infoSite['nome_autor']; ?></h2>
                <p><?php echo $infoSite['descricao']; ?></p>
            </div>
            <div class="w50 left">
                <img class="right" src="<?php echo INCLUDE_PATH; ?>img/plano.jpg"/>
            </div><!-- w50 -->
            <div class="clear"></div>
            </div><!-- center -->
        </section><!-- autor -->
        <section class="especialidades">
            <div class="center">
                <h2 class="title">Especialidades</h2>

                <div class="w33 left box-especialidade">
                    <h3><i class="<?php echo $infoSite['icone1']  ?>" aria-hidden="true"></i></h3>
                
                    <h4>JS</h4>
                    <p><?php echo $infoSite['descricao1']  ?></p>

                </div>

                <!-- arrumar os icones a seren colocados -->
                <div class="w33 left box-especialidade">
                <h3><i class="<?php echo $infoSite['icone2']  ?>" aria-hidden="true"></i></h3>
                
                    <h4>CSS</h4>
                    <p><?php echo $infoSite['descricao2']  ?>></p>
                
                </div>

                <div class="w33 left box-especialidade">
                <h3><i class="<?php echo $infoSite['icone3']  ?>" aria-hidden="true"></i></h3>
                    <h4>HTML</h4>
                    <p><?php echo $infoSite['descricao3'] ?></p>
                    
                </div>
                <div class="clear"></div>

            </div><!-- center -->


        </section><!-- especialidades -->
        <section class="extras">
            <div class="center">
                <!--w50 left 'removido' -->
                <div class="depoimentos-container">
                    <h2 class="title">Depoimentos</h2>
                    <?php
                        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.depoimentos`ORDER BY order_id ASC LIMIT 3");
                        $sql->execute();
                        $depoimento = $sql->fetchAll();
                        foreach($depoimento as $key =>  $value){

                        
                    ?>
                 <div id="sobre" class="depoimentos-single">
                     <p class="descricao-depoimento"><?php echo $value['depoimento'] ?></p>
                        <p class="nome-autor" <?php echo $value['nome'] ?>><?php echo $value['Data'] ?></p>
                 </div>
                    <?php } ?>

                        <!--w50 left 'removido' -->
                    <div class="servicos-container">
                        <h2 class="title">Serviços</h2>
                        <div id="serviços" class="servicos">
                        <ul>
                            <?php
                                $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.servicos`ORDER BY order_id ASC LIMIT 3");
                                $sql->execute();
                                $servicos = $sql->fetchAll();
                                foreach($servicos as $key =>  $value){

                            
                            ?>
                            <li><?php echo $value['servicos']; ?></li>
                            <?php } ?>
                        </div>
                    </div>
                 <div class="clear"></div>
                </div>
            </div>
        </section>