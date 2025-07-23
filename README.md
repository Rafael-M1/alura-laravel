# 🛠️ Laravel – Comandos para Criar e Subir o Projeto `controle-series`

Este guia contém os comandos necessários para iniciar um projeto Laravel chamado **controle-series** e executá-lo em um host e porta específicos.

---

## 📦 1. Criar um novo projeto Laravel

```bash
composer create-project laravel/laravel controle-series
```

## ⚙️ 2. Iniciar o servidor local com host e porta específicos

Use o comando abaixo substituindo o host e a porta desejados:

```bash
php artisan serve --host=0.0.0.0 --port=8000
```

---

## 📋 3. Acesso à aplicação

Após rodar o comando acima, acesse sua aplicação pelo navegador:

```
http://localhost:8000
```

## 🧱 4. Criar um Controller chamado `SeriesController`

Use o comando Artisan abaixo para gerar o controller relacionado a Series:

```bash
php artisan make:controller SeriesController
```

Padrão Post redirect get
