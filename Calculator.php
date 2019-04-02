<?php

namespace BerkNeis\ServerPlanning;

use BerkNeis\ServerPlanning\Exceptions\VirtualMachineException;


/**
 * Class Calculator
 * @package BerkNeis\ServerPlanning
 */
class Calculator
{

    /**
     * @param Server $server
     * @param array $virtualMachines
     * @return int
     */
    public function calculate(Server $server, array $virtualMachines)
    {

        $servers = 1;

        foreach ($virtualMachines as $virtualMachine) {

            if ($server->isMachineAvailable($virtualMachine, 'currentResources')) {
                $server->addVirtualMachine($virtualMachine);
            } else {
                if ($server->isMachineAvailable($virtualMachine, 'resources')) {
                    $servers += 1;
                } else {
                    throw new VirtualMachineException("Your virtual machine is bigger to server");
                }
            }
        }

        return $servers;

    }

}