<?php

require 'vendor/autoload.php';
require 'class/JSONTable.php';
require 'class/TableController.php';
require 'class/TableExtractor.php';

/* Table Controller */
$tbl = new TableController("test");

//adds table records
for($id = 1; $id <= 1000; $id++)
    $tbl->addRow(["id" => $id, "first_name" => "guy", "last_name" => "shitrit"]);

//displays a row from the table
//try {
//    $row = $tbl->getRow(11);
//    print_r(current($row));
//} catch (\JsonMachine\Exception\InvalidArgumentException $e) {
//    die($e->getMessage());
//}

//edits table record
//$tbl->editRow(11, ["first_name" => "guy997"]);

//deletes a record
//$tbl->deleteRow(10);

//exports a table

/* Table Printer */
//$tbl = new TableExtractor("test");
//try {
//    $tbl->printData(["id", "first_name"]);
//}
//catch (\JsonMachine\Exception\InvalidArgumentException $e) {
//    die($e->getMessage());
//}
