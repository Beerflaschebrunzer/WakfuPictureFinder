<?php

require_once 'core/Config.php';
require_once 'core/FileCrawler.php';

class App
{
    private $oFileCrawler;
    private $oConfig;

    public function __construct($ConfigFilePath = "conf/config.json")
    {
        $this->oConfig = new Config($ConfigFilePath);
        $this->oFileCrawler = new FileCrawler($this->oConfig);
    }

    public function getAllFiles()
    {
        $this->oFileCrawler->getAllFiles();
    }

    public function getFilesFromIndexList()
    {
        $this->oFileCrawler->getFilesFromSimpleFile();
    }
}