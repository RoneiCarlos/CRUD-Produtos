<?php require __DIR__.'/Template/Header.php' ?>

<a id="cadastrar-produto" href="/cadastro">Cadastrar produto</a>

<!-- listagem de produtos -->
<h2 class="sub">Lista de produtos<?= $produtos? ' ('.count($produtos).')' : '' ?></h2>
<div class="divisor">
    <hr />
</div>
<ul class="produtos">

    <!-- verificação de produtos retornados -->
    <?php if(!$produtos) { ?>
        <div class="nome_produto">
            <h3>Não há produtos registrados!</h3>
        </div>
    <?php exit(); } ?>

    <!-- loop dos produtos -->
    <?php foreach ($produtos as $id => $produto) { ?>
        <li class="produto">
            <div class="imagem_nome_editar_deletar_produto">
                <div class="imagem_produto">
                    <img src="<?= 'data:image/png;base64,' . base64_encode($produto['imagem']) ?>" alt="imagem do produto" />
                </div>
                <div class="nome_produto">
                    <h3><?= $produto['nome']; ?></h3>
                </div>
                <div class="editar_deletar_produto">
                    <a href="/excluir-produto<?= '?id='.$produto['id']; ?>" id="deletar_produto">Deletar</a>
                    <a href="/editar-produto<?= '?id='.$produto['id']; ?>" id="editar_produto">Editar</a>
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