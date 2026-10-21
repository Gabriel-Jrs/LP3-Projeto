<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Cadastrar Novo Produto</h3>
        </div>

        <?php if (isset($erro)): ?>
            <div class="alert alert-danger"><?= $erro ?></div>
        <?php endif; ?>

        
        <form action="/lp3_projeto/produtos/adicionar" method="POST" class="card-form">
            <div class="form-group">
                <label for="produto">Nome do Produto:</label>
                <input type="text" id="produto" name="produto" required class="form-control" placeholder="Ex: Eletrônicos">
            </div>
            <div class="form-group">
                <label for="valor">Valor:</label>
                <input type="number" id="valor" name="valor" step="0.01" required class="form-control" placeholder="Ex: 100.00">
            </div>
            <div class="form-group">
                <label for="categoria">Categoria:</label>
                <select name="categoria" id="categoria" required class="form-select" required>
                    <option value="">Selecione uma categoria</option>
                    <?php foreach ($categorias as $categoria){ ?>
                        <option value="<?= $categoria['id'] ?>"><?= $categoria['categoria'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição do Produto:</label>
                <textarea name="descricao" id="descricao" class="form-control" rows="4" placeholder="Ex: Produtos eletrônicos"></textarea>
            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="/lp3_projeto/produtos" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
