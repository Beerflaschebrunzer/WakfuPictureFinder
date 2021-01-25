<?php
require_once 'core/App.php';

const BASE_URL = "https://static.ankama.com/wakfu/portal/game/item/115/";

//2 625 440

$oApp = new App();
//$oApp->getAllFiles();
$oApp->getFilesFromIndexList();
