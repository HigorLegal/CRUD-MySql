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
- **CSS3**: Estilos visuais.
- **PHP**: Validação de formulários.
- **phpmyadmin**: criação de banco de dados.



## Estrutura de Pastas

```plaintext
/CRUD-MySql
│
├──────classes #folder para guardar as classes usadas no projeto
├── usuario.PHP # classe de usuario
├── noticia.PHP # classe de noticia

├──────config # folder de configuraçao
├── config.PHP # comando de configuração do banco de dados

├──────uploads # folder de imagens das noticias registradas

├── login.PHP # Página de login.
├── logout.PHP # efetuada apos sair da pagina principal.
├── cadastro.PHP # Página de cadastro de novos usuarios.
├── editar.PHP # Página de alteraçoes dos usuarios criados.
├── p.PHP # Página de alteraçoes dos usuarios criados.
├── index.PHP # Página principal com as noticias.
├── CadastroNot.PHP # Página de cadastro de amigos para a agenda.
├── editarNot.PHP # Página de alteraçao de amigos da agenda.
├── usuario.TXT # arquivo que quarda os usuarios.
├── agenda.TXT #arquivo que guarda os amigos da agenda.
├── funcoes.PHP # arquivo que fica as funçoes usadas para mexer nos arquivos do usuarios e da agenda.
└── README.md # Documentação do projeto.

## Como Executar o Projeto
1. Clone o repositório em sua máquina local:
git clone https://github.com/seu_usuario/CRUD-PHP
2. coloque a pasta clonada no htdocs do **XAMPP**
3. abra o **XAMPP** e inicie o servidor apache 
4. Abra o arquivo em seu navegador usando o link :
localhost/CRUD-PHP/login.php 

Dica: Você pode usar uma extensão de servidor local no VS Code, como
Live Server, para visualizar o projeto com recarregamento automático.

## Desenvolvedor
 Nome do Aluno: Higor da Silva Gomes de Oliveira 
 Contato: higorgom002@gmail.com
```
