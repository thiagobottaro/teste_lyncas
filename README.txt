1 - Seu projeto deve também conter um arquivo README com a explicação das tecnologias utilizadas e as instruções para rodar.

  Nesse projeto foi utilizada liguagem de marcação html, e linguagens de programação Javascript para fazer a buscar de informações
do Google Books.
  Para fazer a persistencia dos dados na parte de favoritos, utilizei o banco de dados MYSQL.
  Para fazer a comunicação entre os dados obtidos no Google Book e o banco de dados, utilizei a linguagem de programação PHP.
  Para fazer a conexão com o banco utilizei o PDO do PHP pois permite fazer a padronização com que PHP se comunica com um banco de dados relacional.
 
  O banco de dados do projeto se encontra no diretorio "db\ " e se chama "teste_lyncas.sql".
  Basta criar um banco de dados chamado teste_lyncas.sql no seu MYSQL e importar esse arquivo com extensão ".sql", deverá ser criada uma tabela chamada
favorito que irá armazenar alguns dados dos livros.

  No diretorio raiz do projeto, tem um arquivo chamado "config.php", esse arquivo deve ser alterado as variáveis, conforme listadas abaixo, 
para fazer a correta comunicação com o banco de dados.
    define(DBNAME,'teste_lyncas');// NOME DO BANCO DE DADOS
    define(DBHOST ,'localhost');  // SERVIDOR QUE ESTA RODANDO A APLICACAO
    define(DBUSER ,'root');	      // USUARIO DO BANCO DE DADOS
    define(DBSENHA,'');	          // SENHA DO USUARIO DO BANCO DE DADOS

  Após fazer as configurações mencionadas, basta chamar chamar a aplicação no seu navegador padrão que deverá estar funcionando.
  Em meu ambiente local ficou: " localhost/teste_lyncas/index.html "

  
  Ao abrir a aplicação no navegador, terá um menu superior com os itens: Home, Pesquisa e Favoritos
  Na pagina home fica disponível para colocar informações da empresa, fica a seu critério o conteúdo que deseja colocar, caso necessário pode ser facilmente removido o item 
do menu, basta pesquisar nos arquivos: index.html, pesquisa.html e favoritos.php pela palavra "Home" e remover do arquivo o trecho "<li><a href="index.html">Home</a></li>".
  Na pagina "Pesquisa", você deve digitar o titulo do livro que deseja buscar e clicar no botão "Pesquisar".
  Na listagem de livros que carregar na tela, em cima de cada livro tem uma caixa de seleção para você marcar se deseja ou não incluir o respectivo livro na seção de favoritos.
  Após marcar o(s) livro(s), no final da página tem um botão com o nome "Adicionar ao Menu de Favoritos", ao clicar nele, estarás montando sua lista de favoritos.
  Na item de menu "Favoritos", a página vai listar o titulo dos livros com seu respectivo id de ISBN do Google.
  Para remover o livro dessa listagem, basta clicar na caixa de seleção dos livros que deseja remover, e clicar no botão "Confirmar Exclusao".


  
2 - Descrever suas dificuldades e facilidades, bem como o número de horas de desenvolvimento.
 Tive um pouco de dificuldade com o Javascript para fazer a busca e apresentação da listagem de livros, pois nunca tinha trabalhado com essa api do Google.
 Utilizei as bibliotecas de javascript local para ficar um pouco mais rapido o funcionando da aplicação.
 Levei cerca de 4h para fazer a parte do javascript funcionar, creio que no final gastei algo em torno de 12h para finalizar tudo.
 Bem bacana essa atividade.