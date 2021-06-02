<?php require __DIR__.'/Template/Header.php' ?>

<a id="listar-produtos" href="/produtos">Listar produtos</a>

<!-- fomulário de inserção -->
<form class="registrar" action="Create.php" method="POST">
    <h2 class="sub">Formulário de registro</h2>
    <div class="inp">
        <label for="nome">Nome do produto</label>
        <input id="nome" name="nome" type="text" placeholder="Nome do produto" />
    </div>
    <div class="inp">
        <label for="descricao">Descrição do produto</label>
        <textarea id="descricao" name="descricao" cols="40" rows="5" maxlength="500" wrap="hard" placeholder="Descrição do produto"></textarea>
    </div>
    <div class="inp">
        <label for="foto">Imagem do produto</label>
        <input id="foto" name="foto" class="foto_adicionar" type="file" accept="image/*" />
    </div>
    <button id="registrar" type="submit">Registrar</button>
</form>

<?php require __DIR__.'/Template/Footer.php' ?>