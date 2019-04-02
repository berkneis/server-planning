<?php

namespace BerkNeis\ServerPlanning;

/**
 * Class Server
 * @package BerkNeis\ServerPlanning
 */
class Server
{

    /**
     * @var Resources
     */
    private $resources;
    /**
     * @var Resources
     */
    private $currentResources;


    /**
     * Server constructor.
     * @param Resources $resources
     */
    public function __construct(Resources $resources)
    {
        $this->resources = $resources;
        $this->currentResources = $resources;
    }


    /**
     * @param Resources $resources
     * @return bool
     */
    public function addVirtualMachine(Resources $resources): bool
    {
        $this->currentResources = new Resources(
            ($this->currentResources->getCpu - $resources->getCpu) ?? 0,
            ($this->currentResources->getRam - $resources->getRam) ?? 0,
            ($this->currentResources->getHdd - $resources->getHdd) ?? 0
        );
        return true;
    }


    /**
     * @param Resources $resources
     * @param null $source
     * @return bool
     */
    public function isMachineAvailable(Resources $resources, $source = null): bool
    {

        if (isset($this->{$source})) {
            if ($this->{$source}->getCpu >= $resources->getCpu && $resources->getCpu > 0
                && $this->{$source}->getRam >= $resources->getRam && $resources->getRam > 0
                && $this->{$source}->getHdd >= $resources->getHdd && $resources->getHdd > 0) {
                //make a new server
                if ($source == 'resources') {
                    $this->currentResources = $this->resources;
                }
                return true;
            }

        }

        return false;
    }

}