<?php require __DIR__.'/Template/Header.php' ?>

<a id="cadastrar-produto" href="/novo-produto">Cadastrar produto</a>

<!-- listagem de produtos -->
<h2 class="sub">Lista de produtos</h2>
<div class="divisor">
    <hr />
</div>
<ul class="produtos">

    <?php foreach ($produtos as $id => $produto) { ?>
        <li class="produto">
            <div class="imagem_nome_editar_deletar_produto">
                <div class="imagem_produto">
                    <img src="<?= 'data:image/jpeg;base64,' . base64_encode($produto['imagem']) ?>" alt="imagem do produto" />
                </div>
                <div class="nome_produto">
                    <h3><?= $produto['nome']; ?></h3>
                </div>
                <div class="editar_deletar_produto">
                    <button id="deletar_produto" value="<?= $produto['id']; ?>">Deletar</button>
                    <button id="editar_produto" value="<?= $produto['id']; ?>">Editar</button>
                </div>
            </div>
            <div class="descricao_produto">
                <p><?= $produto['descricao']; ?></p>
            </div>
            <hr />
        </li>
    <?php } ?>
</ul>

<?php require __DIR__.'/Template/Footer.php' ?>