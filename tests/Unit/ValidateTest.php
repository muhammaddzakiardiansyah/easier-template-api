<?php

use PHPUnit\Framework\TestCase;
use App\Helpers\Validate;

class ValidateTest extends TestCase
{
    /**
     * @test
     */
    public function testField()
    {
        $this->assertTrue(Validate::field("name", "abimantra"));
    }
}
