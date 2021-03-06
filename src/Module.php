<?php

namespace MVF\Codeception\CodeIgniter;

use Scheb\Tombstone\Logger\Graveyard\GraveyardBuilder;

class Module extends \Codeception\Module
{
    private $ci;

    public function _initialize()
    {
        require_once('vendor/scheb/tombstone-logger/tombstone-function.php');
        $graveyard = new GraveyardBuilder();
        $graveyard->rootDirectory(__DIR__);
        $graveyard->autoRegister();
        $graveyard->build();

        require_once(dirname(__FILE__) . '/Setup.php');
        $this->ci = get_instance();
    }

    public function getCodeIgniterInstance()
    {
        return $this->ci;
    }
}
