<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Default preparation for each test
     *
     */
    public function setUp()
    {
        parent::setUp();
    }

}
