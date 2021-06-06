<?php require __DIR__.'/Template/Header.php' ?>

<a id="listar-produtos" href="/produtos">Listar produtos</a>

<!-- fomulário de inserção -->
<form class="registrar" enctype="multipart/form-data" action="<?= $editar? '/atualizar-produto?id='.$id : '/salvar-produto' ?>" method="POST">
    <h2 class="sub">Formulário de registro</h2>
    <div class="inp">
        <label for="nome">Nome do produto</label>
        <input id="nome" name="nome" type="text" placeholder="Nome do produto" <?= $editar ? 'value="'.$nome.'"' : ''?>/>
    </div>
    <div class="inp">
        <label for="descricao">Descrição do produto</label>
        <textarea id="descricao" name="descricao" cols="40" rows="5" maxlength="500" wrap="hard" placeholder="Descrição do produto"><?= $editar ? $descricao : '' ?></textarea>
    </div>
    <div class="inp">
    
    <?php

    if(!$editar) {
        echo '
            <label for="imagem">Imagem do produto</label>
            <input id="imagem" name="imagem" class="imagem_adicionar" type="file" accept="image/*" />
        </div>
        <button id="registrar" type="submit">Registrar</button>
        ';
        exit();
    }

    echo '
    <label style="text-align:center;">Imagem atual do produto</label>
    <div class="imagem_nome_editar_deletar_produto" style="justify-content:center;">
        <div class="imagem_produto">
            <img src="data:image/png;base64,'.base64_encode($produto['imagem']).'" alt="imagem do produto" />
        </div>
    </div>
    <br>
    <label for="imagem">Adicionar nova imagem ao produto</label>
    <input id="imagem" name="imagem" class="imagem_adicionar" type="file" accept="image/*" />
    <button id="registrar" type="submit">Atualizar</button>
    ';

    ?>

</form>

<?php require __DIR__.'/Template/Footer.php' ?>