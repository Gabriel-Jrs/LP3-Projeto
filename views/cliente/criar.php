<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Cadastrar Novo Cliente</h3>
        </div>

        <?php if (isset($erro)): ?>
            <div class="alert alert-danger"><?= $erro ?></div>
        <?php endif; ?>

        
        <form action="/lp3_projeto/categorias/adicionar" method="POST" class="card-form">
            <div class="form-group">
                <label for="categoria">Nome do Cliente:</label>
                <input type="text" id="categoria" name="categoria" required class="form-control" placeholder="Ex: Eletrônicos">
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required class="form-control" placeholder="Ex: joao@email.com">
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="cpf" id="cpf" name="cpf" required class="form-control" placeholder="Ex: 000.000.000-99">
            </div>
            

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="/lp3_projeto/categorias" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
