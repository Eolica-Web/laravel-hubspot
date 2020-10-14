<?php

namespace Eolica\LaravelHubspot\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Eolica\LaravelHubspot\LaravelHubspotServiceProvider;

class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [LaravelHubspotServiceProvider::class];
    }
}
