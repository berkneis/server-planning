<?php

namespace BerkNeis\ServerPlanning\Tests;

use Exception;
use BerkNeis\ServerPlanning\Resources;
use PHPUnit\Framework\TestCase;


/**
 * Resources test case.
 */
class ResourcesTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @dataProvider resourcesDataProvider
     * @param Resources $resources
     * @throws Exception
     */
    public function testResources(Resources $resources)
    {
        $this->assertEquals($resources, $resources);
    }

    public function resourcesDataProvider()
    {
        return [
            [new Resources(1000, 2000, 3000)],
            [new Resources(150, 300, 100)],
            [new Resources(180, 512, 256)]
        ];
    }

    public function calculatorThrowVirtualMachineException()
    {
        $this->expectException(Exception::class);
    }

}
