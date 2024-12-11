# Job Board - Plataforma de Empregos

Bem-vindo ao **Job Board**, uma aplicação web desenvolvida em Laravel para conectar empresas e candidatos. Esta plataforma permite a publicação de vagas de emprego, gestão de candidaturas e muito mais.

## 🎯 Objetivo do Projeto

Criar uma plataforma interativa e funcional que facilite a conexão entre empresas e profissionais em busca de oportunidades.

## 🛠 Funcionalidades

- **Utilizadores**
  - Registo e login para empresas e candidatos.
  - Perfis de utilizadores com informações personalizadas.

- **Gestão de Vagas**
  - Empresas podem criar, editar e excluir vagas de emprego.
  - Filtros por localização, categoria e palavra-chave.

- **Candidaturas**
  - Candidatos podem candidatar-se a vagas e acompanhar o status das suas candidaturas.

- **Painel Administrativo**
  - Administradores podem gerir utilizadores, vagas e candidaturas.

- **Notificações**
  - Notificação para candidatos sobre novas vagas e atualizações nas candidaturas.

## 🏗 Estrutura do Projeto

### 🔗 Base de Dados

O projeto utiliza uma base de dados relacional com as seguintes tabelas principais:
- **users**: Armazena informações dos utilizadores.
- **jobs**: Contém informações sobre as vagas de emprego.
- **categories**: Classifica as vagas por categorias (ex.: TI, Marketing, etc.).
- **applications**: Regista as candidaturas feitas pelos candidatos.
- **job_tag**: Relaciona vagas com tags para categorização adicional.

### 🛠 Tecnologias Utilizadas
- **Laravel**: Framework PHP.
- **MySQL**: Base de dados relacional.
- **Blade**: Motor de templates.
- **Bootstrap**: Framework CSS para design responsivo.

## 🚀 Como Executar o Projeto

1. Clone este repositório:
   ```bash
   git clone https://github.com/seu-usuario/job-board.git
   cd job-board

