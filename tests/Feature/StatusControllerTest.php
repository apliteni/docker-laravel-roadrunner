<?php

namespace Tests\Feature;

use Tests\TestCase;

class StatusControllerTest extends TestCase
{
    /**
     * @return void
     */
    public function testStatusEndpoint(): void
    {
        $this
            ->get('/status')
            ->assertJsonStructure(['status', 'code'])
            ->assertStatus(200);
    }
}
