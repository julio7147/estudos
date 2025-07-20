<?php   
    if(isset($_GET['excluir'])){
        $idExcluir =intval($_GET['excluir']);
        Painel::deletar('tb_admin.servicos',$idExcluir);
        Painel::redirect(INCLUDE_PATH_PAINEL.'listar-servicos');
    }else if(isset($_GET['order']) && isset($_GET['id'])){
        Painel::orderItem('tb_admin.servicos',$_GET['order'],$_GET['id']);
    }
    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] :1;
    $porPagina = 8;
  
    $servicos = Painel::selectAll('tb_admin.servicos',($paginaAtual - 1) * $porPagina,$porPagina);

    

?>

<div class="box-content">
<div class="check">
        <img src="../img/editar.png"/>
    </div>
    <h1>Depoimentos Cadastrados</h1>

    <table>
        <tr>
            <td>Servicos</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
        </tr>
        <?php
            foreach($servicos as $key => $value){
        ?>
        <tr>
            <td><?php echo $value['servicos']; ?></td>
            
            <td><a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-servicos?id=<?php echo $value['id']; ?>">Editar</a></td>
            <td><a actionBtn="delete" class="btn delete"  href="<?php echo INCLUDE_PATH_PAINEL ?>listar-servicos?excluir=<?php echo $value['id']; ?>">Excluir</a></td>
            <td><a href="<?php echo INCLUDE_PATH_PAINEL ?>listar-servicos?order=up&id=<?php echo $value['id'] ?>" ><img src="img/pra-cima.png" /></a></td>
            <td><a class="giro" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-servicos?order=dowm&id=<?php echo $value['id'] ?>" ><img src="img/pra-cima.png" /></a></td>

        </tr>
        <?php } ?>
    </table>
</div>
<div class="paginacao">
   <?php
        $totalPaginas = ceil(count(Painel::selectAll('tb_admin.servicos')) / $porPagina);
        for($i = 1; $i <= $totalPaginas; $i++){
            if($i == $paginaAtual)
                echo '<a class="page-selected" href="'.INCLUDE_PATH_PAINEL.'listar-servicos?pagina='.$i.'">'.$i.'</a>';
            else
                echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-servicos?pagina='.$i.'">'.$i.'</a>';

        }
   ?>
</div>