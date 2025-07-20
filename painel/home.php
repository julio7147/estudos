<?php
    $usuariosOnline =Painel::listarUsuarioOnline();

    $pegarVisitasTotais = MySql::conectar()->prepare("SELECT * FROM `tb_admin.visitas`");
    $pegarVisitasTotais->execute();

    $pegarVisitasTotais = $pegarVisitasTotais->rowCount();



    $pegarVisitasHoje = MySql::conectar()->prepare("SELECT * FROM `tb_admin.visitas` WHERE dia =?");
    $pegarVisitasHoje->execute(array(date('Y-m-d')));

    $pegarVisitasHoje = $pegarVisitasHoje->rowCount();

?>
<div class="box-content left w100">
                <!-- local para inserir imagem ou botão para inicio -->
                <h2>Painel de Controle</h2>
                <div class="box-metricas">
                    <div class="box-metrica-single">
                        <div class="box-metrica-wraper">
                            <h2>usuario online</h2>
                            <p><?php echo count($usuariosOnline); ?></p>
                        </div><!-- box-metrica-wraper -->
                    </div><!-- box-metrica-single -->
                    <div class="box-metrica-single">
                        <div class="box-metrica-wraper">
                            <h2>total de visitas</h2>
                            <p><?php echo $pegarVisitasTotais; ?></p>
                        </div><!-- box-metrica-wraper -->
                    </div><!-- box-metrica-single -->
                    <div class="box-metrica-single">
                        <div class="box-metrica-wraper">
                            <h2>visitas hoje</h2>
                            <p><?php echo $pegarVisitasHoje; ?></p>
                        </div><!-- box-metrica-wraper -->
                    </div><!-- box-metrica-single -->
                    
                </div>
</div><!-- content -->
<div class="box-content left w100">
    <h2>Usuarios online no site</h2>
    <div class="table-responsive">
        <div class="row">
            <div class="col">
                <span>IP</span>
            </div><!-- col -->
            <div class="col">
                <span>Ultima ação</span>
            </div><!-- col -->
            <div class="clear"></div>
        </div><!-- row -->
        <div class="row">
            <?php 
                foreach($usuariosOnline as $key =>$value){

            ?>
            <div class="col">
                <span><?php echo $value['ip'] ?></span>
            </div><!-- col -->
            <div class="col">
                <span><?php echo date('d/m/Y H:i:s',strtotime($value['ultima_acao'])) ?></span>
            </div><!-- col -->
            <div class="clear"></div>
        </div><!-- row -->
        <?php }?>
    </div><!-- table-responsive -->

</div><!-- box-content -->
<div class="box-content left w100">
    <h2>Usuarios online do Painel </h2>
    <div class="table-responsive">
        <div class="row">
            <div class="col">
                <span>IP</span>
            </div><!-- col -->
            <div class="col">
                <span>Ultima ação</span>
            </div><!-- col -->
            <div class="clear"></div>
        </div><!-- row -->
        <div class="row">
            <?php 
                $usuariosPainel = MySql::conectar()->prepare("SELECT * FROM `tb_admin.local`");
                $usuariosPainel -> execute();
                foreach($usuariosPainel as $key =>$value){

            ?>
            <div class="col">
                <span><?php echo $value['user'] ?></span>
            </div><!-- col -->
            <div class="col">
                <span><?php echo pegaCargo($value['cargo']); ?></span>
            </div><!-- col -->
            <div class="clear"></div>
        </div><!-- row -->
        <?php }?>
    </div><!-- table-responsive -->

</div><!-- box-content -->

