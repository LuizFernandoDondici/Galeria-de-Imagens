<?php require __DIR__ . '../../head/head.php ' ?>

<body>
    <main>
        <section>

            <div>
                <form action="" method="POST">
                    <input type="text" name="email" placeholder="E-mail">
                    <input type="text" name="pass" placeholder="Senha">
                    <button> Logar </button>
                </form>
            </div>

            <div>
                <form action="/salvar-acesso" method="POST">
                    <input type="text" name="email" placeholder="E-mail">
                    <input type="text" name="pass" placeholder="Senha">
                    <button> Cadastrar </button>
                </form>
            </div>
 
        </section>
    </main>
</body>
</html>