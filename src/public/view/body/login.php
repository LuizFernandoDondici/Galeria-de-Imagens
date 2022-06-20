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
                        <input type="text" name="email" class="form-control" id="email-save-user" placeholder="E-mail">
                        <small class="form-text text-muted" > exemplo@dominio.com.br </small>
                    </div>
                    <div>
                        <input type="password" name="pass" class="form-control" id="pass-save-user" placeholder="Senha">
                        <small class="form-text text-muted"> senha deve ter 4 digitos </small>
                    </div>
                    <button type="submit" class="btn btn-primary" id="btn-save-user"> Cadastrar </button>
                    <span class="form-text" id="change-to-logar"> Logar? </span>
                </form>
            </div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
            <script src="../../../src/public/script/ajax/ajax-user.js"></script>
            <script src="../../../src/public/script/change-login/change-login.js"></script>
 
        </section>
    </main>
</body>
</html>