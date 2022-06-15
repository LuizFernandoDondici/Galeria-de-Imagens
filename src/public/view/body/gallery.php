<?php require __DIR__ . '../../head/head.php ' ?>

<body>
    <main>
        <section>

            <h1> Galeria </h1>

            <div>
                <nav>
                    <a href="/deslogar"> deslogar </a>
                </nav>
            </div>

            <div>
                <form action="/salvar-foto" method="POST" enctype = "multipart/form-data" id="form=photo">
                    <input type="file" name="img">
                    <button type="submit" id="btn-save-photo"> Salvar </button>
                </form>
            </div>

            <div>
                <?php foreach ($photos as $p): ?>
                <img src="../../../src/public/img/<?php echo $p['name_photo'] ?>" alt="teste" width=" 10%" height="10%" />
                <a href="deletar-foto?id=<?php echo $p['id_photo'] ?>"> deletar </a>
                <?php endforeach ?>
            </div>
 
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
            <script src="../../../src/public/script/ajax/ajax-photo.js"></script>

        </section>
    </main>
</body>
</html>