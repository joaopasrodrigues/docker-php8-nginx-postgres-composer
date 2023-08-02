<?php

$config ["db_name"] = getenv("POSTGRES_DB");
$config ["db_user"] = getenv("POSTGRES_USER");
$config ["db_password"] = getenv("POSTGRES_PASSWORD");
$config ["db_host"] = "db";
$config ["db_port"] = "5432";
$config ["db_charset"]= 'utf8';
