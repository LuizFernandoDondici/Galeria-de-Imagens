<?php require __DIR__ . '../../head/head.php ' ?>

<body>
    <main>
        <section>

            <div>
                <form action="/logar" method="POST" id="form-loginto">
                    <input type="text" name="email" id="email-loginto" placeholder="E-mail">
                    <input type="text" name="pass" id="pass-loginto" placeholder="Senha">
                    <button type="submit" id="btn-loginto"> Logar </button>
                </form>
            </div>

            <div>
                <form action="/salvar-acesso" method="POST" id="form-save-user">
                    <input type="text" name="email" id="email-save-user" placeholder="E-mail">
                    <input type="text" name="pass" id="pass-save-user" placeholder="Senha">
                    <button type="submit" id="btn-save-user"> Cadastrar </button>
                </form>
            </div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
            <script src="../../../src/public/script/ajax/ajax-user.js"></script>
 
        </section>
    </main>
</body>
</html>