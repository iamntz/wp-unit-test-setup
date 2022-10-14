<?php

namespace tests\unit;

use Brain\Monkey\Functions;
use phpmock\spy\Spy;
use PHPUnit\Framework\TestCase;

class SampleWithMockingTest extends TestCase
{
    use \phpmock\phpunit\PHPMock;

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

    public function testSpyFunction()
    {
        // this namespace should match your code namespace.
        // your code MUST be under a namespace, otherwise spying/mocking won't work
        // https://github.com/php-mock/php-mock
        $spy = new Spy('my\namespace', "wp_insert_post", fn() => func_get_args());
        $spy->enable();

        // execute your code here

        $this->assertCount(1, $spy->getInvocations());
    }
}