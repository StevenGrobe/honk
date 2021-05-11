# honk
## Requirement :  
  
Install PHP 7.2.5 or higher and these PHP extensions.  
Install Composer.    
  
## Step 0 - Installation :  
PHP & MySQL install :  
* Get [MAMP](https://www.mamp.info/en/downloads/)
* Create new global environment variables  ```Path - C:\MAMP\bin\php\php7.4.1```  
* Uncomment PDO extension in ```C:\MAMP\bin\php\php7.4.1\php.ini```  
  
Symfony install :  
* Download [Symfony](https://symfony.com/download)  
* In terminal : ```symfony check:requirements ```
  
## Step 1 - Clone project :  
* Clone the project to download its contents in __C:\MAMP\htdocs__  
```git clone https://github.com/StevenGrobe/honk```

* Make composer install the project's dependecies :  
```cd /honk```  
```composer install```  
  
## Step 2 - Database configuration :

* Configure .env with :    
```DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/symfony_db?serverVersion=5.7"```
  
* In terminal (in project directory) :   
```php bin/console make:migration```  
```php bin/console doctrine:migrations:migrate```  

## Step 3 - Launch server :  
* Launch MAMP Apache & MySQL server  
* Start local server :  
```symfony server:start```
