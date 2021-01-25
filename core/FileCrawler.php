<?php
require_once 'core/Logger.php';

class FileCrawler
{
    private $sBaseLocation;
    private $sBaseExtension;

    private $sBaseUrl;

    private $iIndexStart;
    private $iIndexEnd;

    private $oConfig;

    private $oLogger;

    public function __construct(Config $oConfig)
    {
        $this->oConfig = $oConfig;

        $this->oLogger = new Logger();
    }

    public function getAllFiles()
    {
        for ( $iIndex = $this->oConfig->iIndexStart; $iIndex < $this->oConfig->iIndexEnd; $iIndex ++)
        {
            $this->getFile($iIndex);
        }
    }

    public function getFilesFromSimpleFile()
    {
        if (file_exists($this->oConfig->sSourceFilePath))
        {
            $sFileContent = file_get_contents($this->oConfig->sSourceFilePath);
            $aIndexArray = explode($this->oConfig->sSeparator, $sFileContent);
            $this->getFilesFromArray($aIndexArray);
        }
    }

    private function getFilesFromArray($aIndexArray)
    {
        foreach($aIndexArray as $iIndex)
        {
            $this->getFile(trim($iIndex));
        }
    }

    public function getFile($iFileIndex)
    {
        $url        =   $this->oConfig->sBaseUrl.$iFileIndex.$this->oConfig->sBaseExtension;
        $sFileName  =   $this->oConfig->sBaseLocation.$iFileIndex.$this->oConfig->sBaseExtension;

        $this->oLogger->info("Processing $iFileIndex");

        if ($this->urlExists ($url))
        {
            if(file_put_contents($sFileName,file_get_contents($url)))
            {
                echo "$sFileName";
                $this->oLogger->info("\tFile downloaded successfully");
            }
        }
    }

    function urlExists($sUrl)
    {
        $aHeaders=get_headers($sUrl);
        return stripos($aHeaders[0],"200 OK") ? true : false;
    }
}