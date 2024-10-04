<?php

require_once "Config/config.php";
require_once "Helpers/helper.php";

spl_autoload_register(function ($className) {
    require_once 'Libraries/' . $className . '.php';
});
