# COINKY - Sistema Bancário Digital

## 📋 Descrição

**COINKY** é uma aplicação web bancária desenvolvida em PHP que permite aos utilizadores gerir múltiplas contas financeiras (Principal, Poupanças e Reserva) com funcionalidades de transferências, visualização de saldos e histórico de movimentos.

## 🚀 Funcionalidades Principais

### 👤 Gestão de Utilizadores
- **Registo de novos clientes** com validação de email único
- **Sistema de login/logout** com autenticação segura
- **Perfil do utilizador** com possibilidade de alterar dados pessoais
- **Alteração de password** com verificação de segurança
- **Upload e alteração de foto de perfil**

### 💰 Gestão Financeira
- **Três tipos de conta:**
  - 🏦 **Conta Principal** - Para transações diárias
  - 🐷 **Poupanças** - Para objetivos de longo prazo
  - 🛡️ **Reserva** - Para emergências
- **Transferências entre contas** com interface intuitiva
- **Visualização de saldos** em tempo real
- **Histórico completo de movimentos** por conta
- **Gráficos de evolução** dos saldos (Chart.js)

### 📊 Dashboard e Relatórios
- **Dashboard principal** com visualização circular dos saldos
- **Gráficos interativos** para análise de tendências
- **Histórico detalhado** de todas as operações
- **Conversor de moedas** (funcionalidade adicional)

### 🔧 Administração
- **Painel administrativo** para gestão de clientes
- **Lista de todos os clientes** registados
- **Ativação/desativação** de contas
- **Gestão de movimentos** do sistema

## 🛠️ Tecnologias Utilizadas

- **Backend:** PHP 7.4+
- **Base de Dados:** MySQL
- **Frontend:** HTML5, CSS3, JavaScript
- **Bibliotecas:**
  - jQuery
  - Chart.js (para gráficos)
  - Circle Progress (para visualização circular)
  - FontAwesome (ícones)
- **Arquitetura:** MVC (Model-View-Controller)
- **Autoloader:** Composer

## 📁 Estrutura do Projeto

```
14-Luis_rosa_1/
├── config.php                 # Configurações da aplicação
├── composer.json              # Dependências do projeto
├── core/                      # Núcleo da aplicação
│   ├── classes/              # Classes principais
│   │   ├── Database.php      # Gestão da base de dados
│   │   ├── Store.php         # Funções auxiliares
│   │   └── functions.php     # Funções utilitárias
│   ├── controllers/          # Controladores MVC
│   │   ├── Main.php         # Controlador principal
│   │   ├── Admin.php        # Controlador administrativo
│   │   └── Loja.php         # Controlador da loja
│   ├── models/              # Modelos de dados
│   │   ├── Clientes.php     # Modelo de clientes
│   │   ├── AdminModel.php   # Modelo administrativo
│   │   └── alunos.php       # Modelo de alunos
│   ├── views/               # Vistas da aplicação
│   │   ├── layouts/         # Layouts base
│   │   ├── principal.php    # Dashboard principal
│   │   ├── transfer.php     # Página de transferências
│   │   └── ...              # Outras páginas
│   ├── rotas.php            # Sistema de rotas
│   └── rotas_admin.php      # Rotas administrativas
├── public/                   # Ficheiros públicos
│   ├── index.php            # Ponto de entrada
│   ├── assets/              # CSS, JS, imagens
│   └── admin/               # Painel administrativo
└── vendor/                   # Dependências do Composer
```

## 🗄️ Base de Dados

### Tabelas Principais:
- **`clientes`** - Informações dos utilizadores
- **`saldo`** - Saldos das três contas por cliente
- **`movimentos`** - Histórico de todas as transações
- **`admins`** - Utilizadores administrativos
- **`alunos`** - Sistema de registo de alunos

## ⚙️ Instalação e Configuração

### Pré-requisitos
- PHP 7.4 ou superior
- MySQL 5.7 ou superior
- Servidor web (Apache/Nginx)
- Composer

### Passos de Instalação

1. **Clone o repositório:**
   ```bash
   git clone [URL_DO_REPOSITORIO]
   cd 14-Luis_rosa_1
   ```

2. **Instale as dependências:**
   ```bash
   composer install
   ```

3. **Configure a base de dados:**
   - Edite o ficheiro `config.php`
   - Atualize as credenciais da base de dados:
   ```php
   define('MYSQL_SERVER', 'seu_servidor');
   define('MYSQL_DATABASE', 'sua_base_dados');
   define('MYSQL_USER', 'seu_utilizador');
   define('MYSQL_PASS', 'sua_password');
   ```

4. **Configure o servidor web:**
   - Aponte o document root para a pasta `public/`
   - Configure as URLs amigáveis se necessário

5. **Importe a estrutura da base de dados:**
   - Execute os scripts SQL necessários para criar as tabelas

## 🚀 Como Executar

1. **Inicie o servidor web**
2. **Aceda à aplicação:**
   - URL principal: `http://localhost/`
   - Painel admin: `http://localhost/admin/`

## 👥 Utilização

### Para Utilizadores:
1. **Registe-se** como novo cliente
2. **Faça login** com as suas credenciais
3. **Visualize os saldos** no dashboard principal
4. **Execute transferências** entre contas
5. **Consulte o histórico** de movimentos

### Para Administradores:
1. **Aceda ao painel administrativo**
2. **Visualize a lista** de todos os clientes
3. **Gerencie contas** (ativar/desativar)
4. **Monitore movimentos** do sistema

## 🔒 Segurança

- **Encriptação de passwords** com `password_hash()`
- **Proteção contra SQL Injection** com prepared statements
- **Validação de sessões** para acesso às páginas
- **Verificação de permissões** para áreas administrativas

## 📱 Interface

- **Design responsivo** para diferentes dispositivos
- **Interface moderna** com gradientes e animações
- **Visualização intuitiva** dos saldos com gráficos circulares
- **Sliders interativos** para transferências
- **Feedback visual** para todas as ações

## 🎯 Funcionalidades Especiais

- **Sistema de transferências dinâmico** com validação de saldos
- **Gráficos em tempo real** da evolução financeira
- **Interface de conversão de moedas**
- **Sistema de registo de alunos** (funcionalidade adicional)
- **Gestão de ficheiros** para upload de fotos

## 👨‍💻 Desenvolvedor

**Luis Rosa**  
Email: 22244@aeffl.pt  
Projeto desenvolvido no âmbito académico (PAP2022)

## 📄 Licença

Este projeto foi desenvolvido para fins educacionais e académicos.

---

*COINKY - Gerindo o seu dinheiro de forma inteligente* 💰
