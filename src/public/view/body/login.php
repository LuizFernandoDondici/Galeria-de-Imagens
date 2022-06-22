<?php require __DIR__ . '../../head/head.php ' ?>

<body>
    <main>
        <section>

            <div class="form-login" id="form-loginto">
                <form action="/logar" method="POST" >
                    <div>
                        <input type="text" name="email" class="form-control" id="email-loginto" placeholder="E-mail">
                    </div>
                    <div>
                        <input type="password" name="pass" class="form-control" id="pass-loginto" placeholder="Senha">
                    </div>
                    <button type="submit" class="btn btn-primary" id="btn-loginto"> Logar </button>
                    <span class="form-text" id="change-to-cadastrar"> Cadastrar? </span>
                </form>
            </div>

            <div class="form-login" id="form-save-user">
                <form action="/salvar-acesso" method="POST">
                    <div>
                        <input type="text" name="email" class="form-control" id="email-save-user" placeholder="nome@dominio.com.br">
                    </div>
                    <div>
                        <input type="password" name="pass" class="form-control" id="pass-save-user" placeholder="senha de 4 digitos">
                    </div>
                    <button type="submit" class="btn btn-primary" id="btn-save-user"> Cadastrar </button>
                    <span class="form-text" id="change-to-logar"> Logar? </span>
                </form>
            </div>

            <div id="alert-login">
                <span>
                </span>
            </div>
 
        </section>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="../../../public/script/ajax/ajax-user.js"></script>
    <script src="../../../public/script/change-login/change-login.js"></script>

</body>
</html>