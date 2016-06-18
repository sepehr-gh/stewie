# Stewie
PHP MVC FRAMEWORK

## Introduction
Stewie is a simple *PHP MVC FRAMEWORK*, Developed for practicing Object Oriented Designs and MVC matters!

As all frameworks are meant to help developers, Stewie is trying to achieve the same goal.

## USAGE / EXAMPLES

This Explains how to use routers,controllers,and views to simply run your app with stewie version 1.0

### router

Route class has two method that could be used for routing. `get` method which handles GET method requests and pages and `post` method which handles post requests to a route.


Simply you can use `Route` like below to call a function if urls match :

    Route::get("/",function(){
        echo "welcome";
    });

in case you have variable url, you can get these variable values like below :

    Route::get("/user/{username}",function($username){
        echo "welcome $username";
    });

just put variable url part in a *{}* and add a parameter to your function.

### router with controller

In case you wish to use a controller class for your application, You must know that `Route` method second parameter can also be a **controller class name** (which should be as same as controller class file exsiting in ` /controllers ` directory) Concatenated to ** controller method name ** using ** @ ** character. Here is an example :

    Route::get("/hello/{username}","ControllerName@methodName");
    Route::get("/hello/{username}","HelloController@sayHello");

This calls `sayHello` method of a controller class(&file) named `HelloController` in controllers directory. Note that variable `username` is also passed to the controller method.

### view

Stewie uses **Smarty Templae Engine** as its default template engine to generate view files.

    $smartStewie = new SmartStewie();
    $smartStewie->assign("message","welcome");
    $smartStewie->display("welcome.tpl");

`SmartStewie` supports all *View Related* methods available in smarty template engine and is already configed.

in case you are using a controller, you can  `extend BaseController` and you'll have template engine right ready. `$this->templateEngine` gives you access to template engine.

    <?php
    HomeController extends BaseController {
        public function view(){
           $this->templateEngine->assign("message","welcome");
           $this->templateEngine->display("welcome.tpl"); 
        }
    }

### Database

There are several ways to connect to database in Smarty.

#### PDOWrapper for my sql

You can use PdoWrapper class to connect to a running mysql server. Just simply config `db.php` file (read more in **CONFIG** part).

You can add `PdoWrapper` package to your controller file by writing ` s_import("PdoWrapper") ` above your php controller class.

    $db = new PdoWrapper();
    $result = $db->select("test")->results();
    pad($result);

PdoWrapper is already configed. You can read **CONFIG** part in this documentation to know learn how to match it with your own mysql database. There is also a pdf file available with Stewie which explains `PdoWrapper` methods. Just take a look at *PHP_PDO_Class_Wrapper.pdf* 

#### DB Model

As almost all mvc frameworks have, Stewie also has *(at least one)* Model layer named **DB**. There is a built-in MysqlDBHandler class which implements DBHandler. you can use this class after configing db.php file in configs directrory.

Then you can extend BaseModel to be able to use some ready methods such as insert,update,delete,etc

Here how you use it:

**Model Class**

    class Test extends BaseModel{
        protected $table = "test";
    }


**Controller Class**

    <?php
    HomeController extends BaseController {
        public function modelTest(){
            $db = new Test();
            $result = $db->all();
            pad($result);
        }
    }
    ?>


## CONFIGS

There are config files available in *config* folder.

**main** file includes base config arrays and variables that you can set according to your wish. Documentation exists in comments right above each variable. **smartStewieConfig** files has default defines for smarty template engine, configured by Stewie. You can change them as you wish (not recommended). **db** is configuration for your database.


**Attention**
be aware of debug mode/debugging in all config files. each one is doing individual job. 


##EXTERA

### filters

Stewie comes with two defualt filters. **XSS** which cleans htmlentites from $_POST arrays automaticly. Other filter is **csrf**
filter which helps to prevent *csrf* attack in your application.

These filters only work in ` Route::post() ` method as third parameter as String. you can devide filters you cant to use with ` | `. just remember all characters should be Uppercase with no space.

    Route::post("/login",function(){
        var_dump($_POST);
    },"CSRF|XSS"}

**csrf** : To use this filter, you can add ` {csrf} ` to your forms (which are going to post to page). This adds hidden input with csrf as name and session value. Then filter cheks this value and if it was not right values,shows a page.

filter classes implement Filter interface. You can add your own filters and implement Filter class. You can learn how to introduce your own classes/interfaces to stewie below.

### Validators

There are two built-in validators available in Stewie to help you, both developed by other programmers.

**Respect - validation** known as class  **RespectValidator** in stewie, is a large and remarkable validator class which comes with many rules.

Read more about it here [https://github.com/Respect/Validation]

usage :

    $validator = new RespectValidator();
    
**GUMP** is also a handy validator class available in stewie, developed by *Wixel Development Team* .

Read more here [https://github.com/Wixel/GUMP]

### Path Addreses

You can see available path addresses that are already defined in Stewie in `core/defines/address_defines.php` . you can use these paths all across your app.

### Adding your own packages to Stewie (Auto include / Auto_wired)

You can introduce your class and objects to Stewie too. Simply open main.php file in config folder and write them in `$stewie_user_packages` array.

imagine your file in controllers directory, in new folder named "myClasses" :

    <?php
    class UserDefinedClass {
        //codes
    }
    
Add this Key and Value to `$stewie_user_packages` array to be able to use your class across your app without including.

    $stewie_user_packages = array (
        "UserDefinedClass" => _controllers_ . "/myClasses/UserDefinedClass.php",
    )
    

GOOD LUCK;
