# Teste de programação para candidatos à vaga de Desenvolvedor analista PHP (PL).

Olá caro desenvolvedor, nesse teste analisaremos sua forma de programar e inclusive velocidade de desenvolvimento. Abaixo explicaremos tudo o que será necessário.

## Instruções

O desafio consiste em implementar uma aplicação Web utilizando PHP 7, e um banco de dados relacional MySQL ou Oracle, que você mesmo deverá implementar.

Você vai criar uma aplicação de cadastro de usuários, com as seguintes funcionalidades:

- CRUD de cargos.
- CRUD de setores (que deve ter um gerente pra poder ser criado).
- CRUD de usuários (que podem ter ou não setor) e devem possuir 3 níveis de acesso: 1 - administrador; 2 - básico; 3 - avançado.
- CRUD de gerentes (que devem ser usuários já cadastrados e devem possuir um setor).
- Cada CRUD:
  - deve ser filtrável, e possuir paginação de 20 itens.
  - deve possuir formulários para criação e atualização de seus itens.
  - deve permitir a deleção de qualquer item de sua lista.
- Barra de navegação entre os CRUDs.
- Links para os outros CRUDs nas listagens (Ex: link para o detalhe do usuário na lista de usuários de um setor ou do gerente)
- Usuários do nível básico não podem editar informações de outros usuários.
- Só administradores podem dar o cargo de gerência para usuários.
- Siga os padrões das PSRs.

## Modelo de dados

Você deve criar a modelagem, mas tem que ser em um banco de dados relacional. Utilize comentários como atributo nos campos e nas tabelas, caso precise passar alguma explicação, não no código.

## Tecnologias a serem utilizadas

Devem ser utilizadas as seguintes tecnologias:

- HTML
- CSS (se for usar Bootstrap, considere usar a versão 4)
- Javascript
- PHP 7 puro

## Entrega

Para iniciar o teste, faça um fork deste repositório, crie uma branch com o seu nome completo e depois envie-nos o pull request junto com o arquivo com o modelo de dados. Se você apenas clonar o repositório não vai conseguir fazer push e depois vai ser mais complicado fazer o pull request (isso ainda faz parte da avaliação).

Acreditamos que seja necessário 7 dias para fazer tudo isso com qualidade, mas se você precisar de mais tempo, não hesite em nos comunicar. Vamos entender e sua sinceridade contará bons pontos para você. Se fizer em menos tempo, nos surpreenda com a qualidade.

## Bônus

- Implementar autenticação de usuário na aplicação.
- Implementar a ordenação dos itens listados na paginação.
- Permitir que o usuário mude o número de itens por página.
- Permitir deleção em massa de itens nos CRUDs.
- Implementar inserção em massa dos itens dos CRUDs (Ex. subir arquivo CSV com todos os itens de uma tabela).
- Implementar a camada de Front-End utilizando a biblioteca Bootstrap e ser responsiva.
- API Rest JSON para todos os CRUDS listados acima.

## Considerações finais

Como dissemos na introdução, queremos avaliar seu código, mais do que ver tudo funcionando. Não precisa se dedicar a deixar tudo funcionando, mas esteja ciente que isso também será parte da avaliação.

### Boa sorte!
