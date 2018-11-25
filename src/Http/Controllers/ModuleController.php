<?php

namespace hestalabs\Module\Http\Controllers;

use Artisan;
use URL;
use Illuminate\Http\Request;
use hestalabs\Module\Http\Requests\ModuleName;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class ModuleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show Module create pannel
     * @return [type] [description]
     */
    public function create(){
        return view('module::module')->with('data', [null]);
    }

    /**
     * Running Commands to create a module
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(ModuleName $request)
    {   
        try
        {
            $env_file = fopen(env("APP_PATH")."/.env", 'r');
            $created = [];
            
            $module = preg_replace('/\s+/', '', ucwords($request->module));
            
            if($module == "")
            {
                return view('module::module')->with('data', ['Please enter the module name']);
            }

            Artisan::call('make:model', ['name' => $module , '-m'=>'m']);        
            
            $model = Artisan::output();
            
            if($model != "Model already exists!\n")
            {
                $created[0] = "Model created successfully at /app/".$module.".php"; 

                $created[1] = "Migration created at /app/database/migrations/".trim($model,"Model created successfully.\n Created Migration: ")."le.php"; 
            
                if($request->controller == "resource")
                {
                    Artisan::call('make:controller', ['name' => $module.'Controller', '--resource'=>'resource'] );
                    $created[3] = Artisan::output()." at /app/Http/Controllers/".$module."Controller.php";

                    if($request->con == "constructor")
                    {
                        $text2 = "\t/**\n\t* Create a new controller instance.\n\t*\n\t* @return void\n\t*/\n\tpublic function __construct()\n\t{\n\n\t}\n\n\t/**\n";

                        // Working for construcror.                              
                       
                        $reading = fopen(env("APP_PATH")."/app/Http/Controllers/".$module."Controller.php", 'r');
                        $writing = fopen(env("APP_PATH")."/app/Http/Controllers/myfile.tmp", 'w');

                        $replaced = false;

                        while (!feof($reading)) {
                            $line2 = fgets($reading);
                            if($replaced == false){
                                if (stristr($line2,'/**')) {
                                    $line2 = $text2;
                                    $replaced = true;
                                }
                            }
                            fputs($writing, $line2);
                        }
                        fclose($reading); fclose($writing);
                        // might as well not overwrite the file if we didn't replace anything
                        if ($replaced) 
                        {
                            rename(env("APP_PATH")."/app/Http/Controllers/myfile.tmp", env("APP_PATH")."/app/Http/Controllers/".$module."Controller.php");
                        }else {
                          unlink(env("APP_PATH")."/app/Http/Controllers/myfile.tmp");
                        }
                    }

                    //Working for try catch.
                    
                    $text = "\t\ttry{ \n\n \t\t// \n\n \t\t}catch(\Exception \$e){ \n\n \t\t// \n\n\t\t}\n";

                    $reading = fopen(env("APP_PATH")."/app/Http/Controllers/".$module."Controller.php", 'r');
                    $writing = fopen(env("APP_PATH")."/app/Http/Controllers/myfile.tmp", 'w');

                    $replaced = false;

                    while (!feof($reading)) {
                        $line = fgets($reading);
                        if (stristr($line,'//')) {
                            $line = $text;
                            $replaced = true;
                        }
                        fputs($writing, $line);
                    }
                    fclose($reading); fclose($writing);
                    // might as well not overwrite the file if we didn't replace anything
                    if ($replaced) 
                    {
                        rename(env("APP_PATH")."/app/Http/Controllers/myfile.tmp", env("APP_PATH")."/app/Http/Controllers/".$module."Controller.php");
                    }else {
                      unlink(env("APP_PATH")."/app/Http/Controllers/myfile.tmp");
                    }
                }
                else{
                    if($request->controller == "simple")
                    {
                        Artisan::call('make:controller', ['name' => $module.'Controller'] );
                        $created[4] = Artisan::output()." at /app/Http/Controllers/".$module."Controller.php";
                    }
                }
                if($request->view)
                {
                    Artisan::call('make:view', ['name' => $module.'.index']);
                    $created[5] = Artisan::output()." at /app/resources/view/".$module."/index.blade.php";
                }
                return view('module::module')->with('data', $created); 
            }
            else{
                return view('module::module')->with('data', ['Module is already exist !']);
            }
        }catch(\Exception $e){
            return view('module::module')->with('data', ['APP_PATH not defined! set APP_PATH = "your project path" Ex. "/var/www/html/Project Name " at .env file']);
        }
    }
}
