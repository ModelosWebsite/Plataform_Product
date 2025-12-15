````markdown
# DOCUMENTAÇÃO TECNICA - PLATAFORMA WEBSITE CLÁSSICO

O Website Clássico é uma solução que nasceu com o propósito de democratizar a presença digital. 
Criamos websites profissionais, rápidos e elegantes, que ajudam empresas, empreendedores e criativos a destacarem-se online com sofisticação e impacto. 

---

## Visão Geral

Este sistema foi desenvolvido utilizando **Laravel 10** e **Livewire**, com o objetivo de dar presença digital as micro, pequenas e medias empresas, empreendedores, criativos e freelancers. 
A aplicação segue o padrão MVC, com componentes Livewire para interações reativas no frontend.

---

## Stack Tecnológica

- PHP 8.x
- Laravel 10
- Livewire 3
- MySQL 
- Tailwind CSS
- Bootstrap 5

---

## Estrutura do Projeto

O projeto segue a arquitetura padrão do Laravel, com camadas adicionais para **Services**, **Repositories** e **Livewire**, garantindo melhor organização, escalabilidade e manutenção.

---

### Diretórios Principais

```text
.github/
app/
 ├── Console/
 ├── Exceptions/
 ├── Helpers/
 ├── Http/
 ├── Jobs/
 ├── Livewire/
 ├── Mail/
 ├── Models/
 ├── Notifications/
 ├── Providers/
 ├── Repositories/
 ├── Services/
    ├── CompanyContextService.php
    ├── CompanyService.php
    ├── CompanyViewBuilderService.php
    ├── Grouping.php
    ├── HelpZero.php
    ├── InvoiceZero.php
    ├── PaymentService.php
    ├── Request.php
    ├── SubCategoryRoutes.php
    ├── UploadGoogleDrive.php
    ├── ValidAccount.php
    ├── ValidationZero.php
    └── VisitorService.php
 └── Console/
bootstrap/
config/
database/
lang/
public/
resources/
routes/
themes/

````

### Padrões Utilizados

* MVC (Model-View-Controller)
* Service Layer para regras de negócio
* Components-based UI (Livewire)

---

## Fluxo de Funcionamento (Laravel + Livewire)

1. O usuário acessa uma rota definida em `routes/web.php`
2. A rota carrega um Controller
3. O componente Livewire:

   * Inicializa dados no `mount()`
   * Renderiza a view associada
   * Atualiza o estado via eventos sem recarregar a página
4. Regras de negócio são tratadas em `Services e Repositories`
5. Persistência ocorre via Models (Eloquent)

---

## 🔌 Rotas da API Interna

As rotas abaixo são utilizadas para operações internas do sistema, como criação de contas, consulta de empresas e atualização de pagamentos.  
Todas retornam dados em **JSON** e não são destinadas ao consumo público externo.

---

### Criação e Consulta de Empresa

**Controller:** `CreateWebsiteController`

| Método | Endpoint | Método do Controller | Nome da Rota | Descrição |
|------|---------|---------------------|------------|-----------|
| POST | /create/website | createCompany | create.account.website | Cria uma empresa e estrutura inicial do website |
| POST | /get/company | getCompanyByNif | capturar.dados | Consulta dados da empresa a partir do NIF |

---

## Setup do Projeto

### Requisitos

* PHP 8.x
* Composer
* Banco de dados (MySQL)

### Instalação

```bash
git clone [link]
cd projeto
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```
---

## Variáveis de Ambiente

Principais variáveis do `.env`:

```env
APP_NAME=
APP_ENV=
APP_KEY=
DB_CONNECTION=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

LINK_KYTUTES="https://shop.xzero.live/api"
XZERO_FILE_URL="https://xzero.live/send/file"
APP_MAIN_DOMAIN=on.xzero.live
APP_DEFAULT_TENANT=Fortcode
```
---

## Boas Práticas Adotadas

* Código limpo e padronizado
* Separação clara de responsabilidades
* Componentes Livewire pequenos e reutilizáveis