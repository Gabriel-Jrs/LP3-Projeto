<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Editar Genero</h3>
        </div>

        <form action="/lp3_projeto/generos/editar?id=<?= $dados['id'] ?>" method="POST" class="card-form">
            <div class="form-group">
                <label for="nome">Nome do Genero:</label>
                <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($dados['nome']) ?>" required class="form-control">
            </div>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <input type="text" id="descricao" name="descricao" value="<?= htmlspecialchars($dados['descricao']) ?>" required class="form-control">
            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-warning">Atualizar</button>
                <a href="/lp3_projeto/generos" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>