#Module Maker Package


##It will create a complete module with GUI

Module Maker

Introduction:-
		Module Maker is a package which is helpfull to create modules with GUI, you can create a module with or without Controllers and View as per your requirment.

Installation:-
		1. $ composer require sameer/modulemaker
		2. Set your Project path in .env file.
		
		Ex:
		APP_PATH ="Your project path"

Like:-	APP_PATH = "/var/www/html/your project name".
		
Access at browser or Route:

		Url: ServerPath\module

Like: 		http://localhost:8000/module.


Working:-

1. You just have to install ( require ) this packege in your project.
2. You will get a option of ‘Make Module’ in your project when you execute your Project/Website.
3. Click on ‘Module Maker’.
4. Enter Module Name which you want to create.
5. Choose Controller ‘Simple’ or ‘Resource’ , if you want to create controller for your module. 
6. Click on View if you want to create a ‘View’ for your module.
7. Model and migration are the default files for yor module.
8. Click on ‘Create Module’ button to create your module.

Output:-
1. You will get a list or files with there path which you have created for yor module.
2. If you choose resource controller for your module you will get a cerource contriller with ‘try and catch’ .

