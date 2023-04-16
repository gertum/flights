<?php

namespace Tests\Draft;

use App\Models\Port;
use Tests\TestCase;

class PortRelationsTest extends TestCase
{
    public function testRelatedCity () {
        $port = Port::query()->find('ANIMI.');

        $city = $port->city;
        $this->assertNotNull($city);
    }
}
