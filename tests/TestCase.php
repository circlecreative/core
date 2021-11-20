<?php

namespace Neo\Core\Tests;

use Mockery;

class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        Mockery::close();
    }

    /**
     * {@inheritdoc}
     */
    protected function getPackageProviders($app)
    {
        return [\Neo\Core\Providers\NeoCoreServiceProvider::class];
    }


}