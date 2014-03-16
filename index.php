<?php

if(php_sapi_name() == 'cli-server') 
  if(preg_match('@.*/public/.*@', $_SERVER["REQUEST_URI"]))
    return false;



require 'vendor/autoload.php';

require 'env.php';

require_glob('helpers/*.php');
require_glob('bin/*.php');

run_site();
