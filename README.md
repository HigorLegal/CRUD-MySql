# Projeto CRUD MySql


projeto feito na materia de web 2

![Banner do
Projeto](print da tela do site)

## Sobre o Projeto

O **CRUD-MySql** é um site de noticias que e capaz de criar usuarios logar em usuarios criados, alem de poder ver os ususarios cadastrados e 
altera-los.Tambem há um sistema de gerenciamento das  noticias podendo criar noticias, altera-las e remover elas.Esse projeto utiliza **PHP**,**HTML** e **CSS**. 

## Visão Geral

### Estrutura do Projeto


- **pagina de gerenciamento de usuario** : uma pagina que sera  utilizada para ver todos os  usuarios criados e tambem tem  possibilidade de deleta-los, e ir para as telas de cadastro e de alteração.
- **pagina de cadastro de usuarios** : uma pagina que sera utilizada para cadastrar um usuario novo, alem de conter a lista  dos usuarios criados, e tambem tem  possibilidade de deleta-los.
- **pagina de login de usuarios** : uma pagina que sera efetuado o login do usuario cadastrado anteriormente.
- **pagina de alteraçao de usuario** : uma pagina que utilizada para alterar informações do usuario desejado.
- **pagina de cadastro de noticias** : uma pagina que sera efetuada o cadastro dos amigos na agenda, colocando seu nome e seu telefone.
- **pagina de gerenciamento de noticias** : uma pagina que sera utilizada para ver todas as  noticias criadas e tambem tem possibilidade de deleta-los, e ir para as telas de cadastro e de alteração.
- **pagina de alteraçao de noticias** : uma pagina que sera usada para alterar as informações da  noticia escolhida.
- **pagina principal** : uma pagina que ira conter as noticias com seus titulos, resumo da noticia, autores, imagem da noticia e data.

## Pré-requisitos

- **Git**: Para clonar o repositório.
- **XAMPP**: Para iniciar um servidor para mostrar o projeto no seu navegador.
- **Navegador**: Google Chrome, Firefox, Safari, etc., para visualizar
  o site.
- **Editor de Código**: Recomendamos o Visual Studio Code ou o Sublime
  Text.

## Tecnologias Utilizadas

As tecnologias e ferramentas utilizadas neste projeto são:

- **HTML5**: Estruturação semântica e organizada.
- **CSS3**: Estilos visuais e responsividade para dispositivos moveis.
- **PHP**: Validação de formulários.
- **phpmyadmin**: criação de banco de dados.



## Estrutura de Pastas

```plaintext
/CRUD-MySql
│
├──────classes #folder para guardar as classes usadas no projeto
├── usuario.PHP # classe de usuario
├── noticia.PHP # classe de noticia
├── database.PHP # classe do banco de dados que colocara as informaçoes do banco de dados para efetuar a conexão

├──────config # folder de configuraçao
├── config.PHP # comando para conectar com o banco de dados para poder usa-lo.

├──────uploads # folder de imagens das noticias registradas

├── login.PHP # Página de login.
├── logout.PHP # efetuada apos sair que leva para a pagina principal.
├── backupDB.sql # sao os comandos que usei no PhpMyAdmin para criar o banco de dados.
├── gerenciadorUsu.PHP # pagina de gerenciamento dos usuarios com as opçoes de editar alterar e adicionar umo novo usuario.
├── cadastroUsu.PHP # Página de cadastro de novos usuarios.
├── editarUsu.PHP # Página de alteraçoes dos usuarios criados.
├── index.PHP # Página principal com as noticias.
├── gerenciadorNot.PHP # pagina de gerenciamento das noticias com as opçoes de editar alterar e adicionar uma nova noticia.
├── CadastroNot.PHP # Página de cadastro de novas noticias.
├── editarNot.PHP # Página de alteraçao de noticias.
└── README.md # Documentação do projeto.

## Como Executar o Projeto
1. Clone o repositório em sua máquina local:
git clone https://github.com/seu_usuario/CRUD-PHP
2. coloque a pasta clonada no htdocs do **XAMPP**
3. abra o **XAMPP** e inicie o servidor apache 
4. abra o PhpMyAdmin no link "localhost/phpmyadmin"
e crie o banco de dados do arquivo "backupDB.sql".
5. Abra o arquivo em seu navegador usando o link :
localhost/CRUD-PHP/login.php 

## Desenvolvedor
 Nome do Aluno: Higor da Silva Gomes de Oliveira 
 Contato: higorgom002@gmail.com
```
