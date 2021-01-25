<?php


class Logger
{
    public function info($sContent)
    {
        echo date("[Y-m-d H:i:s]") . " " .$sContent . "\n";
    }
}