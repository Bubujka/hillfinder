<?php
require 'vendor/autoload.php';
dev_hosts('localhost:4000');
bu\def\fc_path(__DIR__.'/cache/functions');
require_glob('helpers/*.php');
require_glob('bin/*.php');
run_site();
