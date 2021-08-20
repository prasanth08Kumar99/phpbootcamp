<?php

namespace Tests;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        //Load .env.testing environment
        $app->loadEnvironmentFrom('.env.testing');

        $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

        return $app;
    }

    public function setUp():void
    {
        parent::setUp();
        Artisan::call('migrate');
    }

    public function tearDown():void
    {
        Artisan::call('migrate:reset');
        parent::tearDown();
    }
}
