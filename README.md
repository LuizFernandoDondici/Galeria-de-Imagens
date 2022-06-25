# Galeria de Imagens

Galeria de Imagens feita com [PHP 8.0](https://www.php.net/), a biblioteca JavaScript [JQuery](https://jquery.com/) e o framework CSS [Bootstrap](https://getbootstrap.com/). O banco de dados escolhido foi o [SQLite](https://www.sqlite.org/index.html).

Nesse projeto foi usado o gerenciador de pacotes [Composer](https://getcomposer.org/) para baixar e configurar as bibliotecas <b>autoload</b> e <b>vlucas</b> que servem respectivamente para fazer o carregamento de classes e gerenciar variáveis de ambiente.

## Preparando o ambiente

- Baixe o [PHP](https://www.php.net/manual/pt_BR/install.php)
- Instale o [Composer](https://getcomposer.org/download/)
- Configure o [SQLite](https://www.php.net/manual/pt_BR/ref.pdo-sqlite.php)

Também será preciso criar uma pasta <i>.env</i> na raiz do projeto para criar suas variáveis de ambiente. Essas variáveis devem seguir o modelo exemplificado na pasta <i>.env.example</i>.

Após feito os processos acima será necessário atualizar as dependências do projeto.

- Abra o terminal na pasta da aplicação,
- Digite: <i>composer update</i>

As dependências JQuery e Bootstrap estão sendo feitas via CDN através de links já explícitos no programa. Mas é importante certificar se eles estão atualizados em seus respectivos sites.

## Iniciando a aplicação

- Abra o terminal na pasta da aplicação,
- Digite: <i>php -S localhost:8000 - t src</i> para inicializar o servidor,
- Abra o navegador de sua preferência,
- Digite: <http://localhost:8000/> para acessar o programa.
