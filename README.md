# dump
Dump is script to replace the use of 'var_dump'


just require into the code you want to Dump()

Example:
<?php

  require_once("dump.php")
  
  $name = "Daniel";
  $address = "Brazil";

  dump($name, $address);
  
  
