## Module Maker Package
Module Maker is a package which is helpful to create modules with GUI, you can create a module with or without `Controllers` and `View` as per your requirements.

**Installation:**

- `composer require hestabit/modulemaker`
- Set your Project path in the .env file.
        
        Ex:     APP_PATH ="Your project path"

        Like:   APP_PATH = "/var/www/html/your project name".
        
**Access at browser or Route:**

        Url:    ServerPath/module
        Like:   http://localhost:8000/module.


**Working:**

- You just have to install ( require ) this package in your project.
- Now hit the command in commandline 'php artisan serve'.
- Visit 'ServerPath/module'.
- Enter Module Name which you want to create.
- Choose Controller ‘Simple’ or ‘Resource’, if you want to create the controller for your module. 
- Click on View if you want to create a ‘View’ for your module.
- Model and migration are the default files for your module.
- Click on ‘Create Module’ button to create your module.

**Output:**
- You will get a list of files with there path which you have created for your module.
- If you choose resource controller for your module you will get a resource controller with ‘try and catch’.

