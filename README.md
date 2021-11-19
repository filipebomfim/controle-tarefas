<h1 align="center">
    📖 Controle de Tarefas</a>
</h1>
<p align="center">Projeto de um sistema de controle de tarefas, a partir do aprendizado do curso da <a href="https://www.udemy.com/course/curso-completo-do-desenvolvedor-laravel/">Udemy</a>, com o uso do framework Laravel. Nele, é possível gerenciar tarefas por usuário, com um sistema de autenticação nativo do framework. Você pode acessar o preview do sistema clicando em qualquer uma das badges abaixo. Todo o projeto foi criado e executado no Windows 11  </p>

 [![Generic badge](https://img.shields.io/badge/VERSÃO-1.0-<COLOR>.svg)](http://tarefas2021.epizy.com/public/)
 [![Website shields.io](https://img.shields.io/website-up-down-green-red/http/shields.io.svg)](http://tarefas2021.epizy.com/public/)
 

<p align="center">
 <a href="#features">Funcionalidades</a> •
 <a href="#requisitos">Pré-requisitos</a> •
 <a href="#tecnologias">Tecnologias</a> • 
 <a href="#autor">Autor</a>
</p>

<h3 id="features">⚙️ Funcionalidades</h3>

- [x] Login e Cadastro através da funcionalidade nativa do PHP
- [x] Criação de conta 
- [x] Validação e troca de senha por e-mail
- [x] Cadastro, alteração, visualização e exclusão de tarefas
- [x] Conclusão de uma tarefa e listagem das tarefas concluídas
- [x] Notificações das tarefas por e-mail
- [x] Retorno visual sobre as tarefas atualizadas ou perto do vencimento   

<h3 id="requisitos">🎲 Pré-requisitos</h3>

Antes de começar, você vai precisar ter instalado em sua máquina o [Git](https://git-scm.com), o [Composer](https://getcomposer.org/download/) e o [xampp](https://www.apachefriends.org/pt_br/index.html). 
Além disto é bom ter um editor para trabalhar com o código, como o [VSCode](https://code.visualstudio.com/)

### 🎲 Rodando o Back End (servidor) e o Banco de Dados

```bash
#Na pasta htdocs do xampp, inicie o git
$ git init

# Clone este repositório em um diretório local
$ git clone https://github.com/filipebomfim/controle-tarefas

#No diretório, abra o prompt de comando e instale as dependências do projeto com:
$ php composer install

#E logo após, atualize as dependências com:
$ php composer update

#Antes de inicializar o servidor algumas configurações precisam ser feitas:

# 1. Copie o arquivo de nome '.env.example' na raíz do diretório e cole no mesmo local com um arquivo de nome '.env';

# 2. Insira as seguintes informações referentes ao seu phpMyAdmin no arquivo '.env':
#    2.1. DB_CONNECTION = mysql
#    2.2. DB_HOST= 127.0.0.1 (Caso seja outro IP, alterar)
#    2.3. DB_PORT=3306 (Caso seja outra porta, alterar)
#    2.4. DB_DATABASE= (Nome da base de dados)
#    2.5. DB_USERNAME= (Nome do usuário do banco de dados)
#    2.6. DB_PASSWORD= (Senha do usuário do banco de dados)

#3. Configure um servidor de e-mail para receber as mensagens de notificação alterando as 
#seguintes informações no arquivo '.env':
#    3.1. MAIL_MAILER= (Nome do servidor)
#    3.2. MAIL_HOST= (Endereço do servidor)
#    3.3. MAIL_PORT= (Porta do servidor)
#    3.4. MAIL_USERNAME=(Nome do usuário do servidor)
#    3.5. MAIL_PASSWORD= (Senha do usuário do servidor)
#    3.6. MAIL_ENCRYPTION= (Tipo de criptografia)
   
#Execute o servidor Apache e o MySQL no painel de controle do xampp
#Crie uma base de dados no phpMyAdmin e ponha o nome dela de acordo com o que foi colocado no item 2.4

#Carregue as tabelas de dados do banco com o comando:
$ php artisan migrate

#Execute o servidor no diretório onde o projeto foi baixado com:
$ php artisan serve
```

<h3 id="tecnologias">🛠 Tecnologias</h3>

As seguintes tecnologias foram usadas na construção do projeto:

- HTML5
- CSS3
- PHP
- Laravel 8
- SQL
- Bootstrap 4

<h3 id="autor">🦸 Autor</h3>

Feito com carinho e dedicação por mim, rs. Filipe Bomfim 👋🏽 Entre em contato!

[![Gmail Badge](https://img.shields.io/badge/-Filipe-c14438?style=flat-square&logo=Gmail&logoColor=white&link=mailto:filipebomfim.dev@gmail.com)](mailto:filipebomfim.dev@gmail.com)
[![Linkedin Badge](https://img.shields.io/badge/-Filipe-blue?style=flat-square&logo=Linkedin&logoColor=white&link=https://www.linkedin.com/in/filipe-bomfim-931256224/)](https://www.linkedin.com/in/filipe-bomfim-931256224/)
