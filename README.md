Projeto está no MASTER

#--DESCRIÇÃO--
Sistema de cadastro de produtos em plataforma com persistencia em banco de dados, com as seguintes funcionalidades:
*Insersão de dados categorias a partir de leitura de .CSV.
*Registro de produtos atrelados as categorias.
*listagem dos registros atrelados as categorias.
*Alteração de produtos sendo todos eles ou somente 1.
*Exlusão de produtos.
*telas para melhor compreenção.


#--INSTALAÇÃO--
Para que tudo rode com eficiencia sguir o passo a passo de instalação e configuração do ambiente.
1. Download do Xampp site. https://www.apachefriends.org/pt_br/download.html
2. Dentro do Xammp habilitar os serviços (portas default):
	1.APACHE port 80,443
	2.MySQL port 3306
3.pelo navegador entrar no banco de dados: http://localhost/phpmyadmin/
4.Dentro do banco de dados rodas as seguintes querys(necessarias para a aplicação)

Create dataBase olist;

CREATE TABLE tb_categorias(
ID int not null AUTO_INCREMENT PRIMARY KEY,
Nome varchar(250) not null
);
CREATE TABLE tb_produtos (
ID int not null AUTO_INCREMENT PRIMARY KEY,
nome varchar(50) not null,
descricao varchar(250),
valor decimal(9,2),    
fk_categoria int not null  
);


DELIMITER $$

CREATE PROCEDURE SP_CADASTRAPRODUTO(IN nome varchar(50), in descricao varchar(250), in valor decimal(9.2), in fk_categoria int)
BEGIN
insert into tb_produtos(nome, descricao, valor, fk_categoria) VALUES(nome, descricao, valor, fk_categoria);

END $$
DELIMITER ;

5.Salvar o projeto no diretorio padrão do xampp: C:\xampp\htdocs

6.acessar a aplicação pelo localHost: http://localhost/Projeto%20Olist/


#--TESTES--
1. Dentro do aplicativo clicar na aba "ENVIAR", selecionar a base categorias_produtos.csv no diretorio principal da aplicação: C:\xampp\htdocs\Projeto Olist
2. verificação no banco de dados se os dados foram inseridos com sucesso, tabela: tb_categorias!
3. Insersão de novos produtos, testando todas as opções de categorias também verificar no banco de dados se o vinculo de herança esta correto, tabela tb_produtos.
4. Vizualizar a listagem dos produtos na aba "Listar Produto", verificar se a tabela está atualizada com todos os dados inseridos na etapa anterior.
5. Edição dos dados já inseridos na aba "editar Produto", realizar a edição de um produto utilizado seu codigo e vizualizar se o mesmo foi alterado com sucesso, verificar tbm nas demais bas se a alteração ocorreu com sucesso.
6. Realizar a Exclusão de um registro na aba "Exluir Produto", verificar se a exclusão ocorreu com sucesso, a esclusão deve refletir nas demais abas também.


#--AMBIENTE--
Computador desktop i7, rtx 2060, ssd
Sistemas operacinal Windows 10
Editor de texto Sublime Text
IDE apache
Bibliotecas: Bootstrap, Jquery
Linguagem de programação: PHP, JS e Mysql
