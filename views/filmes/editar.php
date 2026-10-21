<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Editar Filme</h3>
        </div>

        <?php if (isset($erro)): ?>
            <div class="alert alert-danger"><?= $erro ?></div>
        <?php endif; ?>

        
        <form action="/lp3_projeto/filmes/editar?id=<?= $dado['id'] ?>" method="POST" class="card-form">
            <div class="form-group">
                <label for="filme">Nome do Filme:</label>
                <input type="text" id="filme" name="filme" value="<?= htmlspecialchars($dado['filme']) ?>" required class="form-control">
            </div>
            <div class="form-group">
                <label for="diretor">Diretor:</label>
                <input type="text" id="diretor" name="diretor" value="<?= htmlspecialchars($dado['diretor']) ?>" required class="form-control">
            </div>
            <div class="form-group">
                <label for="duracao">Duração (minutos):</label>
                <input type="number" id="duracao" name="duracao" value="<?= $dado['duracao'] ?>" required class="form-control">
            </div>
            <div class="form-group">
                <label for="imagem">Imagem:</label>
                <input type="text" id="imagem" name="imagem" value="<?= htmlspecialchars($dado['imagem']) ?>" required class="form-control">
            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-warning">Atualizar</button>
                <a href="/lp3_projeto/filmes" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>