<?
include_once "Comand/Comand.php";
include_once "workingMethodsFile/Work.php":



$Comand = new Comand();  
$WorkLibrary = new WorkLibrari();
$WorkLibrary->methoodOpenFile("file");
$Comand->logCommand($WorkLibrary->methodEditFile("Обычный текст"));
$Comand->previousСommand();
$WorkLibrary->methodCloseFile();

