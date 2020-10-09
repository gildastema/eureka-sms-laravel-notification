<?php

namespace Eureka\SMS\Tests;

use Orchestra\Testbench\TestCase;
use Eureka\SMS\EurekaSmsNotificationServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [EurekaSmsNotificationServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
