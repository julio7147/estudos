<?php 
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $slide = Painel::select('tb_site.noticias','id = ?',array($id));
    }else{
        Painel::alert('erro','Voce precisa passar o parametro ID.');
        die();
    }
?>
<div class="box-content">
    <div class="check">
        <img src="../img/editar.png"/>
    </div>
    <h1>Editar Noticias</h1>

    <form method="post" enctype="multipart/form-data">
    <?php
			if(isset($_POST['acao'])){
				//Enviei o meu formulário.
				
				$nome = $_POST['titulo'];
                $conteudo = $_POST['conteudo'];
				$imagem = $_FILES['capa'];
				$imagem_atual = $_POST['imagem_atual'];
                $verifica = MySql::conectar()->prepare("SELECT `id` FROM `tb_site.noticias` WHERE titulo = ? AND id != ?");
                $verifica->execute(array($nome,$id));
                if($verifica->rowCount() == 0){
				if($imagem['name'] != ''){

					//Existe o upload de imagem.
					if(Painel::imagemValida($imagem)){
						Painel::deleteFile($imagem_atual);
						$imagem = Painel::uploadFile($imagem);
                        $slug = Painel::generateSlug($nome);
						$arr = ['titulo'=>$nome,'categoria_id'=>$_POST['categoria_id'],'conteudo'=>$conteudo,'capa'=>$imagem,'slug'=>$slug,'id'=>$id,'nome_tabela'=>'tb_site.noticias'];
						Painel::update($arr);
						$slide = Painel::select('tb_site.noticias','id = ?',array($id));
						Painel::alert('sucesso','A noticia foi editado junto com a imagem!');
					}else{
						Painel::alert('erro','O formato da imagem não é válido');
					}
				}else{
					$imagem = $imagem_atual;
                    $slug = Painel::generateSlug($nome);
					$arr = ['titulo'=>$nome,'data'=>date('Y-m-d'),'categoria_id'=>$_POST['categoria_id'],'conteudo'=>$conteudo,'capa'=>$imagem,'slug'=>$slug,'id'=>$id,'nome_tabela'=>'tb_site.noticias'];
					Painel::update($arr);
					$slide = Painel::select('tb_site.noticias','id = ?',array($id));
					Painel::alert('sucesso','A noticia foi editado com sucesso!');
				}
                }else{
                    Painel::alert('erro','Já existe uma noticia com esse nome');
                }

			}
		?>
        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="titulo" required value="<?php echo $slide['titulo']; ?>">
        </div><!-- form-group -->
        <div class="form-group">
            <label>Conteudo:</label>
            <textarea class="tinymce" name="conteudo"><?php echo $slide['conteudo']; ?></textarea>
        </div><!-- form-group -->
        <div class="form-group">
        <label>Categoria:</label>
        <select name="categoria_id">
            <?php
            $categorias = Painel::selectAll('tb_site.categorias');
            foreach($categorias as $key => $value){


            ?>
            <option <?php if($value['id'] == $slide['categoria_id'])echo 'selected'; ?> value="<?php echo $value['id'] ?>"><?php echo $value['nome'] ?></option>
            <?php }?>
        </select>
        </div>

        <div class="form-group">
            <label>Imagem:</label>
            <input type="file" name="capa" />
            <input type="hidden" name="imagem_atual" value="<?php echo $slide['capa']; ?>">
        </div><!-- form-group -->
        <div class="form-group">
           <input type="submit" name="acao" value="Atualizar!">
        </div><!-- form-group -->
    </form>
    
    
</div><!-- box-content -->