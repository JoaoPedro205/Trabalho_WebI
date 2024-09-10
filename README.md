DESCRIÇÃO DE FUNCIONAMENTO:

index.html:

Este HTML cria uma página web para o cadastro de clientes, parte do sistema "JP Veículos". A página possui um formulário onde o usuário insere o nome, e-mail e telefone do cliente. O formulário utiliza o método POST para enviar esses dados para um arquivo PHP chamado processa_cliente.php, que irá processar as informações e envia-las para o banco de dados. A tela é estilizado por meio de um arquivo CSS externo chamado style.css. Ao final do preenchimento, há um botão que envia as informações para o arquivo php processa_cliente e leva o usuário para a próxima etapa do cadastro.

processa_cliente.php:

Este PHP, chamado processa_cliente.php, processa os dados enviados a partir do formulário de cadastro de clientes. Primeiro, incluindo a conexão com o banco de dados (conexao.php). Em seguida, recupera os dados do cliente enviados via POST (nome, e-mail e telefone). O script verifica se o cliente já existe no banco de dados. Caso exista, ele obtém o ID do cliente; caso contrário, insere um novo registro na tabela de clientes e recupera o ID gerado automaticamente para o novo cliente. Após processar a inserção ou verificação, o sistema redireciona o usuário para a página de cadastro de veículos (veiculo.html). No final, ele encerra a conexão com o banco de dados.

veiculo.html:

Este HTML define uma página para o cadastro de veículos, parte do sistema "JP Veículos". A página apresenta um formulário onde o usuário pode inserir os dados do veículo, que são o modelo, a marca, o ano e o preço, esses dados são enviados para o arquivo PHP processa_veiculo.php usando o método POST, que irá processar e armazenar as informações no banco de dados. O layout é estilizado por meio de um arquivo CSS externo (style.css). Após o preenchimento, o botão de envio encaminha as informações para o arquivo php e redireciona o usuário para a próxima etapa, que é o cadastro da venda.

processa_veiculo.php:

Este PHP, chamado processa_veiculo.php, realiza o processamento dos dados do formulário de cadastro de veículos. Ele inicia incluindo a conexão com o banco de dados através do arquivo conexao.php. Depois, recupera os dados do veículo (modelo, marca, ano e preço) enviados via metodo POST depois disso ele realiza uma verificação para ver se o veículo já existe na base de dados, utilizando o modelo, marca e ano como critérios. Se o veículo já existir, ele obtém o ID correspondente; se não, insere o novo veículo na tabela de veiculos e recupera o ID gerado automaticamente para o registro. Ao final, o usuário é redirecionado para a página de cadastro de vendas (venda.html) e a conexão com o banco de dados é encerrada.

vendas.html:

Este HTML cria uma página para o cadastramento de vendas e pagamentos no sistema "JP Veículos". Ele possui um formulário que coleta informações importantes sobre a venda, como o ID do cliente, o ID do veículo, e a data da venda. Também coleta informações do vendedor, como o seu ID e o seu nome, além de detalhes do pagamento, como o valor e a data. Os dados são enviados para o arquivo PHP processa_venda.php através do método POST para serem processados e armazenados no banco de dados. O design da página é definido por um arquivo de estilo externo (style.css). Ao finalizar o cadastro, o usuário realiza o envio os dados clicando no botão "Finalizar Cadastro".

processa_venda.php:

Este PHP, chamado processa_venda.php, é responsável pelo processar e registro dos dados de vendas e pagamentos no sistema "JP Veículos". Primeiro, ele inclui o arquivo conexao.php para estabelecer a conexão com o banco de dados. Em seguida, o script recupera os dados do formulário enviados via POST, que incluem informações sobre o vendedor, o cliente, o veículo, a data da venda, o valor do pagamento e a data do pagamento ele realiza a verificação para saber se o vendedor já existe na tabela de vendedores, caso não exista, ele insere um novo registro e obtém o ID do vendedor. Depois, insere os dados da venda na tabela vendas, associando o cliente, o veículo e o vendedor, e obtém o ID da venda gerado. Em seguida, ele insere os dados do pagamento na tabela pagamentos, associando o pagamento à venda correspondente. Se todas as operações forem bem-sucedidas ele conclui o processamento e redireciona o usuário para a página de relatórios.

relatorios.php:

Este PHP exibe os relatórios cadastrados nos formulários do sistema "JP Veículos". Primeiro ele inclui a conexão com o banco de dados (conexao.php), depois ele gera quatro relatórios em uma única página HTML. Ele começa exibindo um relatório de vendas que lista informações sobre cada venda, possuindo o ID da venda, o nome do cliente, os detalhes do veículo, o ID e nome do vendedor, e a data da venda. Em seguida, apresenta um relatório de pagamentos com dados sobre o ID do pagamento, o ID da venda associada, o valor pago e a data do pagamento. O terceiro relatório é sobre clientes, mostrando o ID do cliente, nome, e-mail e telefone. Por ultimo, o relatório de veículos lista o ID do veículo, modelo, marca, ano e preço. Cada relatório é gerado a partir de consultas SQL, exibindo os dados em tabelas HTML. Se não houver dados disponíveis, uma mensagem informando "Nenhum dado encontrado" é mostrada. Após os relatórios, há um link para retornar ao formulário de cadastro e começar todo o processo novamente, o script então encerra a conexão com o banco de dados.

conexao.php:

Este PHP estabelece uma conexão com o banco de dados para o sistema "JP Veículos", ele define as variáveis necessárias para conectar ao banco de dados, sendo eles o nome do servidor (localhost), o nome de usuário (root), a senha ("", vazia), e o nome do banco de dados (sistema_vendas), ele utiliza a classe mysqli, o script cria uma nova instância de conexão com o banco de dados, caso a conexão falhar, o script exibe uma mensagem de erro e encerrará a execução, informando que houve uma falha na conexão. Se a conexão for bem-sucedida, o arquivo continua a execução e permiti que outras partes do sistema interajam com o banco de dados para realizar operações, isso conforme for determinado nos outros arquivos PHP.

sistema_vendas.sql:

O banco de dados do sistema é projetado para gerenciar informações relacionadas a clientes, veículos, vendas, vendedores e pagamentos, ele possui cinco tabelas para o funcionamento do sistema. A tabela clientes armazena informações sobre os clientes, cada cliente tem um identificador único, id_cliente, além de campos para o nome, e-mail e telefone. A tabela veiculos contém detalhes sobre os veículos disponíveis para venda, cada veículo tem um identificador único, id_veiculo, e campos para o modelo, marca, ano e preço. A tabela vendedores guarda informações sobre os vendedores, possui um identificador único, id_vendedor, e um campo para o nome do vendedor. A tabela vendas é usada para registrar cada venda realizada, ela possui um identificador único, id_venda, e utiliza chaves estrangeiras para referenciar os IDs dos clientes, veículos e vendedores que estão envolvidos nas vendas, além de um campo para a data da venda, as chaves estrangeiras asseguram que cada venda esteja corretamente associada aos registros das tabelas clientes, veiculos e vendedores. Por ultimo, a tabela pagamentos registra os pagamentos feitos para cada venda, contém um identificador único, id_pagamento, e inclui o valor do pagamento e a data em que foi realizado, além de uma chave estrangeira que referencia o ID da venda correspondente, permitindo consultar e verificar o pagamento associado a cada venda.

![tabela png](https://github.com/user-attachments/assets/d259ef74-354d-4896-9150-df52c963cce7)


