<?php

namespace App\Test;

use PHPUnit\Framework\TestCase;
use App\Generation\Singleton\Singleton;

class SingletonTest extends TestCase
{
    private Singleton $instance;

    protected function setUp(): void
    {
        $this->instance = Singleton::getInstance();
    }

    public function testNotEmpty(): void
    {
        $this->assertNotEmpty($this->instance);
    }

    public function testIsEqualsInstances(): void
    {
        $instance2 = Singleton::getInstance();
        $this->assertEquals($instance2, $this->instance);
    }

    public function testHasEqualsData(): void
    {
        $instance2 = Singleton::getInstance();
        $this->instance->setProperty('key1', 'value1');

        $this->assertEquals($instance2->getProperty('key1'), $this->instance->getProperty('key1'));
    }
}