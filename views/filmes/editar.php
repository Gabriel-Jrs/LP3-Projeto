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

        
        <form action="/lp3_projeto/clientes/editar?id=<?= $dado['id'] ?>" method="POST" class="card-form">
            <div class="form-group">
                <label for="nome">Nome do Filme:</label>
                <input type="text" id="nome" name="nome" required class="form-control" placeholder="Ex: O Poderoso Chefão">
            </div>
            <div class="form-group">
                <label for="diretor">Diretor do Filme:</label>
                <textarea name="diretor" id="diretor" class="form-control" rows="4" placeholder="Ex: Francis Ford Coppola"></textarea>
            </div>
            <div class="form-group">
                <label for="email">Duração do Filme (minutos):</label>
                <input type="number" id="email" name="email" required class="form-control" placeholder="Ex: 120">
            </div>
            <div class="form-group">
                <label for="imagem">Imagem do Filme:</label>
                <input type="text" id="imagem" name="imagem" required class="form-control" placeholder="Ex: HD, 4K, 1080p">
            </div>
            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-success">Atualizar</button>
                <a href="/lp3_projeto/clientes" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>