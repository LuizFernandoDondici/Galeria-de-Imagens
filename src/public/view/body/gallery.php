<?php require __DIR__ . '../../head/head.php ' ?>

<body>
    <main>
        <section>

            <div class="menu">
                <h1 class="title"> Galeria </h1>
                <a href="/deslogar" class="logout" id="link-logout"> deslogar </a>
            </div>

            <div class="form-file">
                <form action="/salvar-foto" method="POST" enctype = "multipart/form-data" id="form-img">
                    <input type="file" name="img">
                    <button type="submit" class="btn btn-primary btn-sm" id="btn-save-img"> Salvar Arquivo </button>
                </form>
            </div>

            <div id="alert-img">
                <span></span>
            </div>

            <?php foreach ($photos as $p): ?>
            <div class="container-img">  
                <img src="../../../src/public/img/<?php echo $p['name_photo']?>" alt="imagem" class="img">
                <a href="deletar-foto?id=<?php echo $p['id_photo']?>" class="delete-img"> deletar </a>
            </div>
            <?php endforeach ?>
            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
            <script src="../../../src/public/script/ajax/ajax-photo.js"></script> 
            <script src="../../../src/public/script/zoom-img/zoom-img.js"></script>

        </section>
    </main>
</body>
</html>