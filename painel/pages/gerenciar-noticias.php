<?php   
    if(isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);
        $selectImagem = MySql::conectar()->prepare("SELECT capa FROM `tb_site.noticias` WHERE id = ?");
        $selectImagem->execute(array($_GET['excluir']));

        $imagem = $selectImagem->fetch()['slide'];
        Painel::deleteFile($imagem);
        Painel::deletar('tb_site.noticias',$idExcluir);
        Painel::redirect(INCLUDE_PATH_PAINEL.'gerenciar-noticias');
    }else if(isset($_GET['order']) && isset($_GET['id'])){
        Painel::orderItem('tb_site.noticias',$_GET['order'],$_GET['id']);
    }
    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] :1;
    $porPagina = 4;
  
    $noticias = Painel::selectAll('tb_site.noticias',($paginaAtual - 1) * $porPagina,$porPagina);

    

?>

<div class="box-content">
<div class="check">
        <img src="../img/editar.png"/>
    </div>
    <h1>Noticias Cadastradas</h1>

    <table>
        <tr>
            <td>Titulo</td>
            <td>Categoria</td>
            <td>Imagem</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
        </tr>
        <?php
            foreach($noticias as $key => $value){
            $nomeCategoria = Painel::select('tb_site.categorias','id=?',array($value['categoria_id']))['nome'];
        ?>
        <tr>
            <td><?php echo $value['titulo']; ?></td>
            <td><?php echo $nomeCategoria; ?></td>
            

            <td><img style="width: 150px;height:100px;" src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value['capa']; ?>"/></td>


            <td><a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-noticias?id=<?php echo $value['id']; ?>">Editar</a></td>
            <td><a actionBtn="delete" class="btn delete"  href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-noticias?excluir=<?php echo $value['id']; ?>">Excluir</a></td>
            <td><a href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-noticias?order=up&id=<?php echo $value['id'] ?>" ><img src="img/pra-cima.png" /></a></td>
            <td><a class="giro" href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-noticias?order=dowm&id=<?php echo $value['id'] ?>" ><img src="img/pra-cima.png" /></a></td>

        </tr>
        <?php } ?>
    </table>
</div>
<div class="paginacao">
   <?php
        $totalPaginas = ceil(count(Painel::selectAll('tb_site.noticias')) / $porPagina);
        for($i = 1; $i <= $totalPaginas; $i++){
            if($i == $paginaAtual)
                echo '<a class="page-selected" href="'.INCLUDE_PATH_PAINEL.'gerenciar-noticias?pagina='.$i.'">'.$i.'</a>';
            else
                echo '<a href="'.INCLUDE_PATH_PAINEL.'gerenciar-noticias?pagina='.$i.'">'.$i.'</a>';

        }
   ?>
</div>