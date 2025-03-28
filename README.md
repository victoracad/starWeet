# Projeto: Rede Social

## 📸 Imagens do Projeto
Aqui estão algumas capturas de tela do projeto: </br>
<img  src="https://drive.google.com/uc?export=view&id=1-Fk_o6sHFduvirzHFNQ2R_meoh7TDIuk" alt="Tela de Login" width="800px">
<img  src="https://drive.google.com/uc?export=view&id=1-D-8Je31rkGyG4EC8Mrx3gNdsdPqAKbw" alt="Tela de Login" width="500px">
<img  src="https://drive.google.com/uc?export=view&id=1-EmOexHGaCpJ80hLQqAGh9h2HuePIrHl" alt="Tela de Login" width="800px">

---

## Descrição
Este projeto tem como objetivo a criação de uma **rede social**, implementando funcionalidades essenciais como:
- Publicação de postagens (com ou sem imagem);
- Curtir postagens;
- Seguir e deixar de seguir usuários;

## Tecnologias Utilizadas
O desenvolvimento do projeto utilizou as seguintes tecnologias:

### **Backend**
- **Laravel**: Framework PHP utilizado para construção da API e lógica do sistema.
- **MySQL + phpMyAdmin**: Gerenciamento do banco de dados da aplicação.
- **Envio de e-mail automático**: Implementado com Laravel, utilizando autenticação via senha de aplicativo do Gmail.
- **Processamento assíncrono**: Requisições AJAX para otimizar a interação com o backend.

### **Frontend**
- **HTML, CSS, JS**: Base para estrutura e estilização da interface.
- **Tailwind CSS**: Framework para estilização rápida e responsiva.
- **jQuery**: Facilitação das interações dinâmicas e requisições AJAX.

### **Controle de Versão**
- **Git & GitHub**: Versionamento e hospedagem do código.
- **GitHub Desktop**: Gerenciamento visual das branches e commits.

# Como iniciar o projeto no seu Desktop

Este guia irá ajudá-lo a configurar e rodar o projeto corretamente no seu ambiente local.

## 1. Clonando o Repositório

Primeiro, clone o repositório do GitHub para o seu computador usando o seguinte comando:

```sh
git clone https://github.com/victoracad/starWeet.git
```

Depois, entre na pasta do projeto:

```sh
cd starWeet
```

## 2. Instalando o XAMPP

O projeto utiliza **servidor Apache e MySQL**, que podem ser configurados utilizando o **XAMPP**. Se você ainda não o possui instalado, siga os passos abaixo:

1. Baixe o XAMPP no site oficial: [https://www.apachefriends.org/](https://www.apachefriends.org/)
2. Instale o XAMPP e inicie os serviços **Apache** e **MySQL** pelo painel de controle.

Isso garantirá que o servidor e o banco de dados estejam rodando corretamente.

## 3. Instalando o Laravel

Certifique-se de que você tenha o **Composer** instalado. Se não tiver, baixe e instale pelo site oficial:

[https://getcomposer.org/](https://getcomposer.org/)

Após instalar o Composer, dentro da pasta do projeto, execute o seguinte comando para instalar as dependências do Laravel:

```sh
composer install
```

## 4. Instalando o Node.js

O **Tailwind CSS** já está configurado no repositório, então não há necessidade de instalá-lo novamente. No entanto, para rodá-lo corretamente, precisamos do **Node.js**.

Se você ainda não tem o **Node.js**, baixe e instale a versão mais recente no site oficial:

[https://nodejs.org/](https://nodejs.org/)

Após a instalação, dentro da pasta do projeto, instale as dependências do Node.js:

```sh
npm install
```

## 5. Configurando o ambiente

Antes de rodar o projeto, configure o arquivo `.env` com suas credenciais do banco de dados. Caso não exista, copie o arquivo de exemplo:

```sh
cp .env.example .env
```

E gere a chave do aplicativo:

```sh
php artisan key:generate
```

## 6. Rodando o projeto

Agora, siga os passos abaixo para iniciar o servidor Laravel e o Tailwind CSS:

1. No **VS Code**, abra um terminal e rode o servidor do Laravel:

    ```sh
    php artisan serve
    ```

2. Abra **outro terminal** no VS Code e inicie o Tailwind CSS:

    ```sh
    npm run dev
    ```

3. Certifique-se de que **Apache** e **MySQL** estão ativos no XAMPP.

4. No navegador, acesse o projeto através do seguinte endereço:

    ```
    http://127.0.0.1:8000
    ```

Agora o projeto está rodando corretamente no seu ambiente local! 🚀
