<?php
dev_hosts('localhost:4000');
bu\def\fc_path(__DIR__.'/cache/functions');

ActiveRecord\Config::initialize(function($cfg){
  $cfg->set_model_directory(__DIR__.'/models');
  
  $connections = Symfony\Component\Yaml\Yaml::parse(file_get_contents(__DIR__.'/db/config.yml'));
  
  foreach($connections as $k=>&$v)
    $v = sprintf('mysql://%s:%s@localhost/%s', $v['username'], $v['password'], $v['database']);
  
  $cfg->set_connections($connections);

  if(!is_dev_host())
    $cfg->set_default_connection('production');
});
