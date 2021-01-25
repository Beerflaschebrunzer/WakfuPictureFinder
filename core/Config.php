<?php


class Config
{
    public $sBaseLocation = "./data/";
    public $sBaseExtension = ".png";

    public $sBaseUrl = "https://static.ankama.com/wakfu/portal/game/item/115/";

    public $iIndexStart = 0;
    public $iIndexEnd = 100;

    public $sSeparator = ",";
    public $sSourceFilePath = "conf/source.txt";

    public function __construct($sConfigFilePath)
    {
        $strJsonFileContents = file_get_contents($sConfigFilePath);
        $aConfig = json_decode($strJsonFileContents, true);

        if (isset($aConfig['start']) && !empty($aConfig['start']))
        {
            $this->iIndexStart = $aConfig['start'];
        }
        if (isset($aConfig['end']) && !empty($aConfig['end']))
        {
            $this->iIndexEnd = $aConfig['end'];
        }
        if (isset($aConfig['data_location']) && !empty($aConfig['data_location']))
        {
            $this->sBaseLocation = $aConfig['data_location'];
        }
        if (isset($aConfig['separator']) && !empty($aConfig['separator']))
        {
            $this->sSeparator = $aConfig['separator'];
        }
        if (isset($aConfig['source_file_path']) && !empty($aConfig['source_file_path']))
        {
            $this->sSourceFilePath = $aConfig['source_file_path'];
        }
    }
}