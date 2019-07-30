<?php

declare(strict_types = 1);

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @return void
     */
    public function testCreation(): void
    {
        User::create([
            'name'     => $name = $this->faker->name,
            'email'    => $email = $this->faker->email,
            'password' => $password = Hash::make('password'),
        ]);

        $this->assertDatabaseHas('users', [
            'name'  => $name,
            'email' => $email,
        ]);
    }
}
