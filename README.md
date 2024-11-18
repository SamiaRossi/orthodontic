## Sistema de Sugestões: ##
Esse Sistema é um  Teste Prático para Vaga de Desenvolvedor de Tecnologia da Informação da Empresa Orthodontic Center.
Candidata: Sâmia Siqueira Martins Rossi.

Descrição do Projeto:
Desenvolver um sistema de sugestões onde os usuários possam enviar sugestões, votar nas sugestões enviadas por outros usuários e visualizar as sugestões mais votadas.
O sistema também deve permitir que os administradores atualizem o status das sugestões enviadas.

Ferramentas Utilizadas:
PHP,  Visual Code, JavaScript, HTML, Ajax, CSS o Banco de Dados MySQL.

A tela inicial é a de Login e Senha onde os usuário terão a opção de Entrar (no caso de usuários já cadastrados) , a opção de Cadastrar (para aqueles que ainda não são cadastrados) 
e Recuperar Senha (para o caso de esquecer a senha de acesso).
O cadastro é simples, apenas com digitação de email e senha. O campo senha possui uma demonstração de “poder” da senha digitada, porém não impede o cadastramento de senhas “fracas”.
A recuperação da senha é feita através de envio por email. 
Lembrando que para que o email seja enviado corretamente é necessário fazer configurações na função: mail function dentro do arquivo php.ini da máquina de acordo com o email remetente na página recuperar.php.

Os usuários podem ser Tipo 0: Admin ou Tipo 1: Comum
Os usuários comuns efetuam o seu próprio cadastro e o Admin deixei previamente cadastrado no Banco: 
Email: samiarossi@yahoo.com.br e Senha: Samia1914!

Após entrar com Email e Senha o sistema fará a autenticação criando os Cookies que serão validados a cada requisição de página.
Com os cookies criados o usuário será direcionado para a Tela de Sugestões da seguinte forma:
1. Usuários Adm - irão para tela onde podem atualizar o status das sugestões. Somente as sugestões Aprovadas ficarão disponíveis para Votação e também podem acompanhar a totalização dos votos.
2. Usuários Comuns - irão para tela onde visualizam a lista de sugestões previamente aprovadas pelo Adm. Essa tela permite o envio de novas sugestões e permite que os usuários votem em sugestões cadastradas por outros usuários. Através dessa tela é possível o acompanhamento da quantidade de votos de cada Sugestão.
Cada usuário pode votar apenas uma vez em cada sugestão.
Usuário não pode votar e sua própria sugestão.

P.S. --> Deixei cadastrado no Banco algumas Sugestões. Todas estão com o status incial “Pendente” e aguardam a Aprovação pelo Adm.
Estou à disposição para qualquer dúvida ou esclarecimento.
