<?php

namespace BerkNeis\ServerPlanning;


/**
 * Class Resources
 * @package BerkNeis\ServerPlanning
 */
class Resources
{

    /**
     * @var int
     */
    private $cpu;
    /**
     * @var int
     */
    private $ram;
    /**
     * @var int
     */
    private $hdd;


    /**
     * Resources constructor.
     * @param int $cpu
     * @param int $ram
     * @param int $hdd
     */
    public function __construct($cpu = 0, $ram = 0, $hdd = 0)
    {
        $this->cpu = $cpu;
        $this->ram = $ram;
        $this->hdd = $hdd;
    }

    /**
     * @param $propertyName
     * @return int
     */
    public function __get($propertyName): int
    {
        $propertyName = ltrim(strtolower($propertyName), 'get');
        if (property_exists($this, $propertyName)) {
            return $this->$propertyName;
        }
        return false;
    }

}