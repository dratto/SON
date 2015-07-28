<?php

define('CLASS_DIR', __DIR__ . '/../src/');
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
function my_autoload ($pClassName) {
    require_once CLASS_DIR . str_replace("\\", "/", $pClassName) . ".php";
}
spl_autoload_register("my_autoload");
