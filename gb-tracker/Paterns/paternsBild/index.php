<?php
// Патерн билдер
namespace RealizationBD;
include_once 'autoload.php';




function Work(){
	$workBd = new Engine();
	$workBd->ChoiseBd("nameBD")->
			 DBConnection("Login & pass BD")->
			 DBRecrord("insert name from `bd`")->
			 DBQueryBuiler();
	
Work();