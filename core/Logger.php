<?php

class Logger
{
    public function write($sContent)
    {
        echo date("[Y-m-d H:i:s]") . " " .$sContent . "\n";
    }

    public function info($sContent)
    {
        $this->write(" \t[INFO]\t ".$sContent);
    }

    public function success($sContent)
    {
        $this->write(" \t[SUCCESS]\t ".$sContent);
    }

    public function warning($sContent)
    {
        $this->write(" \t[WARNING]\t ".$sContent);
    }

    public function error($sContent)
    {
        $this->write(" \t[ERROR]\t ".$sContent);
    }
}