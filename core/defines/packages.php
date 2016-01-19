<?php

$stewie_class_packages = array(
    "AbstractRouter" => _core_ . "/AbstractRouter.php",
    "PdoWrapper" => _core_ . "/database/pdo_wrapper/class.pdowrapper.php",
    "SmartStewie" => _core_ . "/template_engine/SmartStewie.php",
    "GUMP" => _core_ . "/lib/validators/GUMP/gump.class.php",
    "RespectValidator" => _core_ . "/lib/validators/RespectValidator/RespectValidator.php",
    "DB" => _core_ . "/database/DB/DB.php",
    // Filters
    "CSRF" => _core_ . "/filters/CSRF.php",
    "XSS" => _core_ . "/filters/XSS.php",
);
$stewie_other_packages = array(
    "ParsePath" => _core_ . "/lib/parse_path.php",
);
