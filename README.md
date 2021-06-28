XFLY - ERP

_Developed by Ruby Development_

## Project

*This is a final paper school, made by students from Bauru, São Paulo, Brazil.*

**Objectives**
With this software, we are looking for use our knowledge of Laravel and Bootstrap, besides git flow and a real work flow.

**What is this project?**
Xfly ERP is an ERP created based on a necessity of Xfly Bauru company. Is focused on management of drone services, financial sector and clients of the enterprise.
  
  
## Setting Local Environment  


1. Clone the `xfly-erp` repository

```

git clone git@gitlab.com:PixeLarm12/xfly-erp.git

cd xfly-erp

cp .env.example .env

```

  

2. Configure your `.env` to your localhost. Follow the example below, but change to adapt with your computer

```

DB_CONNECTION=mysql

DB_HOST=localhost

DB_PORT=3306

DB_DATABASE=xfly

DB_USERNAME=root

DB_PASSWORD=

```

  

3. Run the commands below to set Laravel

```

composer install

php artisan key:generate

php artisan storage:link

php artisan migrate

php artisan serve

```

4. Check your `localhost` and must have running **Xfly ERP** in your browser

  
  

_**If you want to use `Kool.dev` to run Xfly ERP, follow the steps below**_

  

1. Clone the `xfly-erp` repository

```

git clone git@gitlab.com:PixeLarm12/xfly-erp.git

cd xfly-erp

cp .env.example .env

```

  

2. Configure your `.env` to your localhost. Follow the example below, but change to adapt with your computer

```

DB_CONNECTION=mysql

DB_HOST=database

DB_PORT=3306

DB_DATABASE=xfly

DB_USERNAME=docker

DB_PASSWORD=secret

```

  

3. Follow the link below to setup Laravel

- https://kool.dev/docs/getting-started/existing-project

  

4. Check your `localhost` and must have running **Xfly ERP** in your browser
