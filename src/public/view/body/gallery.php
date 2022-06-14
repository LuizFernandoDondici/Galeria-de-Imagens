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
                <form action="/salvar-foto" method="POST" enctype = "multipart/form-data" >
                    <input type="file" name="img">
                    <button type="submit"> Salvar </button>
                </form>
            </div>

            <div>
                <?php foreach ($photos as $p): ?>
                <img src="../../../src/public/img/<?php echo $p['name_photo'] ?>" alt="teste" width=" 10%" height="10%" />
                <a href="deletar-foto?id=<?php echo $p['id_photo'] ?>"> deletar </a>
                <?php endforeach ?>
            </div>
 
        </section>
    </main>
</body>
</html>