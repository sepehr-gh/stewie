# Stewie
PHP MVC FRAMEWORK

## Introduction
Stewie is a simple *PHP MVC FRAMEWORK*, Developed by Sepehr Ghorbanpoor for practicing Object Oriented Designs and MVC matters!
As all frameworks are meant to help developers, Stewie is trying to achieve the same goal.
This framework cares about *RAM* and *PROCESSOR* and tries not to kill them !!!!

## USAGE / EXAMPLES

This Explains how to use routers,controllers,and views to simply run your app with stewie version 0.5

### router

Router class has two method that could be used for routing. `get` method which handles GET method requests and pages and `post` method which handles post requests to a route.


Simply you can use `Router` like below to call a function if urls match :

    Router::get("/",function(){
        echo "welcome";
    });

in case you have variable url, you can get these variable values like below :

    Router::get("/user/{username}",function($username){
        echo "welcome $username";
    });

just simply put variable url part in a *{}* and add a parameter to your function.

### router with controller

In case you wish to use a controller class for your application, You must know that `Router` method second parameter can also be a **controller class name** (which should be as same as controller class file) exsiting in ` /controllers ` directory. Third parameter is controller method you wish to call. Here is an example :

    Router::get("/hello/{username}","HelloController","sayHello");

This calls `sayHello` method of a controller class(&file) named `HelloController` in controllers directory. Note that variable `username` is also passed to the controller method.

### view

Stewie uses **Smarty Templae Engine** as its default template engine to generate view files. in case you want to use it in a router with no controller class but a callback function, You should first import it.

    import("SmartStewie");

to know what is `import()` you can read **EXTRA** part below, in this document. You should just know it adds `SmartStewie` Template engine which is expanding `smarty` and lets you do ` new SmartStewie() `

`SmartStewie` supports all *View Related* methods available in smarty template engine and is already configed.

in case you are using a controller, you can simply `extend BaseController` and you'll have template engine right ready. `$this->templateEngine` gives you access to template engine.

### Database

right now MODEL part is not ready compeletly, but dont worry. There is a built-in "PDOWRAPPER" class available in Stewie. Just import it using `import("PdoWrapper")` and use it.

    $db = new PdoWrapper();

PdoWrapper is already configed. You can read **CONFIG** part in this documentation to know learn how to match it with your own mysql database. There is also a pdf file available with Stewie which explains `PdoWrapper` methods. Just take a look at *PHP_PDO_Class_Wrapper.pdf* 

## CONFIGS

There are config files available in *config* folder.

**main** file includes base config arrays and variables that you can set according to your wish. Documentation exists in comments right above each variable. **smartStewieConfig** files has default defines for smarty template engine, configured by Stewie. You can change them as you wish (not recommended). **db** is configuration for your database.


**Attention**
be aware of debug mode/debugging in all config files. each one are doing individual job. 


