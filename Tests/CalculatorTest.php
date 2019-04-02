<?php

namespace BerkNeis\ServerPlanning\Tests;

use BerkNeis\ServerPlanning\Calculator;
use BerkNeis\ServerPlanning\Exceptions\VirtualMachineException;
use BerkNeis\ServerPlanning\Resources;
use BerkNeis\ServerPlanning\Server;
use PHPUnit\Framework\TestCase;


/**
 * Class CalculatorTest
 * @package BerkNeis\ServerPlanning\Tests
 */
class CalculatorTest extends TestCase
{

    /**
     * @var
     */
    private $calculator;

    /**
     *
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->calculator = new Calculator();
    }


    /**
     * @dataProvider calculatorDataProvider
     * @param Server $server
     * @param array $virtualMachines
     * @param int $result
     * @throws VirtualMachineException
     */
    public function testCalculator(Server $server, array $virtualMachines, $result)
    {
        $this->assertEquals($result, $this->calculator->calculate($server, $virtualMachines));
    }

    /**
     * @return array
     */
    public function calculatorDataProvider()
    {
        return [
            [
                new Server(new Resources(2, 32, 100)),
                [
                    new Resources(1, 16, 10),
                    new Resources(1, 16, 10),
//                    new Resources(2, 32, 100)
                ],
                1
            ],
            [
                new Server(new Resources(2, 32, 100)),
                [
                    new Resources(1, 16, 10),
                    new Resources(1, 16, 10),
                    new Resources(2, 32, 100)
                ],
                2
            ],
        ];
    }

    /**
     *
     */
    public function calculatorThrowVirtualMachineException()
    {
        $this->expectException(VirtualMachineException::class);
    }

}
