<?php   
    if(isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);
        $selectImagem = MySql::conectar()->prepare("SELECT slide FROM `tb_admin.slide` WHERE id = ?");
        $selectImagem->execute(array($_GET['excluir']));

        $imagem = $selectImagem->fetch()['slide'];
        Painel::deleteFile($imagem);
        Painel::deletar('tb_admin.slide',$idExcluir);
        Painel::redirect(INCLUDE_PATH_PAINEL.'listar-slides');
    }else if(isset($_GET['order']) && isset($_GET['id'])){
        Painel::orderItem('tb_admin.slide',$_GET['order'],$_GET['id']);
    }
    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] :1;
    $porPagina = 4;
  
    $slides = Painel::selectAll('tb_admin.slide',($paginaAtual - 1) * $porPagina,$porPagina);

    

?>

<div class="box-content">
<div class="check">
        <img src="../img/editar.png"/>
    </div>
    <h1>listar eslides</h1>

    <table>
        <tr>
            <td>Nome</td>
            <td>Imagem</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
        </tr>
        <?php
            foreach($slides as $key => $value){
        ?>
        <tr>
            <td><?php echo $value['nome']; ?></td>
            

            <td><img style="width: 150px;height:100px;" src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value['slide']; ?>"/></td>


            <td><a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-slides?id=<?php echo $value['id']; ?>">Editar</a></td>
            <td><a actionBtn="delete" class="btn delete"  href="<?php echo INCLUDE_PATH_PAINEL ?>listar-slides?excluir=<?php echo $value['id']; ?>">Excluir</a></td>
            <td><a href="<?php echo INCLUDE_PATH_PAINEL ?>listar-slides?order=up&id=<?php echo $value['id'] ?>" ><img src="img/pra-cima.png" /></a></td>
            <td><a class="giro" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-slides?order=dowm&id=<?php echo $value['id'] ?>" ><img src="img/pra-cima.png" /></a></td>

        </tr>
        <?php } ?>
    </table>
</div>
<div class="paginacao">
   <?php
        $totalPaginas = ceil(count(Painel::selectAll('tb_admin.slide')) / $porPagina);
        for($i = 1; $i <= $totalPaginas; $i++){
            if($i == $paginaAtual)
                echo '<a class="page-selected" href="'.INCLUDE_PATH_PAINEL.'listar-slides?pagina='.$i.'">'.$i.'</a>';
            else
                echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-slides?pagina='.$i.'">'.$i.'</a>';

        }
   ?>
</div>