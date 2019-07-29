<?php

namespace Tests\Feature;

use Tests\TestCase;

class IndexPageTest extends TestCase
{
    /**
     * @return void
     */
    public function testIndexPageOpening(): void
    {
        $this
            ->get('/')
            ->assertSee('Laravel')
            ->assertStatus(200);
    }
}
