<?php
class Log
{
    public static function logWrite($data)
    {
        $directory = "/logs";
        $file = date ('Y-m-d') . ".log";

        $path = dirname(__DIR__) . $directory . $file; // un "dirname" par arboresence
        $string = date("H:i:s") . " " . $data;
        
        $handle = fopen($path,"a"); // ouvert en mode écriture  et se met à la fin di fich. Si n'existe pas le crée
        //$handle = fopen($path,"c"); // ouvert en mode écriture  et se met au début du fich. et lock le fichier
        //$handle = fopen($path,"w"); // ouvert en mode écriture  et se met au début du fich. et efface tout


        if (flock($handle, LOCK_EX))
        {
            fwrite($handle, $string . PHP_EOL);
            flock($handle,LOCK_UN);
            fclose($handle);
        }


    }
}