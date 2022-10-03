<?php

namespace tests\unit;

use Brain\Monkey\Functions;
use PHPUnit\Framework\TestCase;

class SampleWithMockingTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        \Brain\Monkey\setUp();

        Functions\stubs([
            'wp_parse_args' => fn($a = [], $b = []) => array_merge($b, $a),
        ]);
    }

    protected function tearDown(): void
    {
        \Brain\Monkey\tearDown();
        parent::tearDown();
    }

    public function testFoo()
    {
        $this->assertTrue(true);
    }
}