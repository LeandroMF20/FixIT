# FixIT

O FixIT é um projeto pessoal para portfólio, que tem como objetivo demonstrar os pontos-chave de tudo que aprendi e venho aprendendo desenvolvendo um sistema ERP de médio porte. Além disso, usarei este projeto para aprender novas tecnologias, entender melhor padrões de arquitetura de software e trabalhar melhor com conceitos de Clean Architecture, entre outros conceitos importantes na produção de softwares robustos e modernos.

## Objetivos

O objetivo principal é pegar tudo que aprendi na prática e trazer para este projeto. Mas além disso, busco aprender mais sobre Front-End e uso de frameworks para reatividade de páginas.

Também tenho como objetivo buscar simplicidade, por isso a escolha do uso do servidor embutido no ambiente de desenvolvimento e o SQLite3 como escolha de banco de dados. Mais informações sobre essas escolhas estão no tópico abaixo, sobre as tecnologias utilizadas no projeto.

## Stack do projeto

- CodeIgniter 4 (com instalação via Composer)
- Vite
- Vue 3

Estas tecnologias são só o stack inicial, onde o foco é o aprendizado e uso prático do Vue 3, usado de forma complementar à estrutura de views do CodeIgniter 4. Isso significa que futuramente irei implementar o uso de recursos como Axios, Tailwind CSS e outras tecnologias que fizerem sentido incluir no projeto.

## Pré-requisitos

- PHP ^8.2
- Composer
- Node.js

Além disso, certifique-se de que as seguintes extensões PHP estejam instaladas e ativas, em caso de erros ao rodar o `composer install`:

- ext-intl
- ext-mbstring
- ext-ctype
- ext-dom
- ext-filter
- ext-json
- ext-libxml
- ext-pcntl
- ext-phar
- ext-tokenizer
- ext-xmlwriter

## Setup

A instalação atualmente é bem simples. Seguindo os passos abaixo, já é possível executar o projeto localmente:

```bash
composer install
npm install
php spark migrate # Para criar o banco de dados e sua estrutura inicial
```

No final de tudo, é possível executar o projeto usando o comando `npm run dev` na raiz do projeto.