<?php

namespace tests\integration;

use WP_UnitTestCase;
use Brain\Monkey\Functions;

class SampleTest extends WP_UnitTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        \Brain\Monkey\setUp();
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