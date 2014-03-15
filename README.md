Files and structure
-------------------

* **./bin/** - controllers
* **./models/** - models
* **./view/** - views
* **./helpers/** - aux functions
* **./db/config.yml** - mysql config
* **./bin/api.php** - public api methods
* **./install** - script for preparing working environment

Installation
------------

Ensure that you have installed:

* ruby, rubygems
* php5-cli (5.3+)
* [composer](https://getcomposer.org/doc/00-intro.md#installation-nix)
* bundle gem


On local mysql server run those queries:
```sql
create database `hillsearcher`;
grant all privileges on hillsearcher.* TO 'hillsearcher'@'localhost' identified by 'hillsearcher';
```

Run install script:
```bash
./install
```

And start server:
```bash
./server
```
