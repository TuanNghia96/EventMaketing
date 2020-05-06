<?php 
namespace App\Facade;

class Helper
{
    /**
     * get upper case of string
     * 
     * @param  string $str string need uppercase
     * @return string
     */	
    public function toUpperCase($name)
    {
        return mb_strtoupper($name, 'UTF-8');
    }
}
?>
