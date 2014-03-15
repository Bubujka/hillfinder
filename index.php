<?php
require 'vendor/autoload.php';

require 'env.php';

require_glob('helpers/*.php');
require_glob('bin/*.php');

run_site();
