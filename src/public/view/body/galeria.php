<?php require __DIR__ . '../../head/head.php ' ?>

<body>
    <main>
        <section>
            <h1> Galeria </h1>

            <div>
                <form action="/salvar-foto" method="POST" enctype = "multipart/form-data" >
                    <input type="file" name="img">
                    <button type="submit"> Salvar </button>
                </form>

            </div>
        </section>
    </main>
</body>
</html>