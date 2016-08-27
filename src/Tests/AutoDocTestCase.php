<?php

/**
 * Created by PhpStorm.
 * User: roman
 * Date: 26.08.16
 * Time: 11:50
 */

namespace RonasIT\Support\AutoDoc\Tests;

use Illuminate\Foundation\Testing\TestCase;
use RonasIT\Support\AutoDoc\Services\SwaggerService;

class AutoDocTestCase extends TestCase
{
    protected $docService;

    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->docService = app(SwaggerService::class);
    }

    public function createApplication(){}

    public function tearDown()
    {
        $currentTestCount = $this->getTestResultObject()->count();
        $allTestCount = $this->getTestResultObject()->topTestSuite()->count();

        if (config('auto-doc.enabled') && ($currentTestCount == $allTestCount) && (!$this->hasFailed())) {
            $this->docService->saveProductionData();
        }

        parent::tearDown(); // TODO: Change the autogenerated stub
    }
}