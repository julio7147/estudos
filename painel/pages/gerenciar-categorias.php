<?php   
    if(isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);
        Painel::deletar('tb_site.categorias',$idExcluir);
        $noticias = MySql::conectar()->prepare("SELECT * FROM `tb_site.noticias` WHERE categoria_id = ?");
        $noticias->execute(array($idExcluir));
        $noticias = $noticias->fetchAll();
        foreach ($noticias as $key => $value){
            $imgDelete = $value['capa'];
            Painel::deleteFile($imgDelete);
        }
        $noticias = MySql::conectar()->prepare("DELETE FROM `tb_site.noticias` WHERE categoria_id = ?");
        $noticias->execute(array($idExcluir));
        Painel::redirect(INCLUDE_PATH_PAINEL.'gerenciar-categorias');
        
        
    }else if(isset($_GET['order']) && isset($_GET['id'])){
        Painel::orderItem('tb_site.categorias',$_GET['order'],$_GET['id']);
        
    }
    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] :1;
    $porPagina = 4;
  
    $categorias = Painel::selectAll('tb_site.categorias',($paginaAtual - 1) * $porPagina,$porPagina);

    

?>

<div class="box-content">
<div class="check">
        <img src="../img/editar.png"/>
    </div>
    <h1>Categorias Cadastradas</h1>

    <table>
        <tr>
            <td>Nome</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
        </tr>
        <?php
            foreach($categorias as $key => $value){
        ?>
        <tr>
            <td><?php echo $value['nome']; ?></td>


            <td><a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-categoria?id=<?php echo $value['id']; ?>">Editar</a></td>
            <td><a actionBtn="delete" class="btn delete"  href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-categorias?excluir=<?php echo $value['id']; ?>">Excluir</a></td>
            <td><a href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-categorias?order=up&id=<?php echo $value['id'] ?>" ><img src="img/pra-cima.png" /></a></td>
            <td><a class="giro" href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-categorias?order=dowm&id=<?php echo $value['id'] ?>" ><img src="img/pra-cima.png" /></a></td>

        </tr>
        <?php } ?>
    </table>
</div>
<div class="paginacao">
   <?php
        $totalPaginas = ceil(count(Painel::selectAll('tb_site.categorias')) / $porPagina);
        for($i = 1; $i <= $totalPaginas; $i++){
            if($i == $paginaAtual)
                echo '<a class="page-selected" href="'.INCLUDE_PATH_PAINEL.'gerenciar-categorias?pagina='.$i.'">'.$i.'</a>';
            else
                echo '<a href="'.INCLUDE_PATH_PAINEL.'gerenciar-categorias?pagina='.$i.'">'.$i.'</a>';

        }
   ?>
</div>