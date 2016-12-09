<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegisterUserTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /** @test */
    public function it_allows_a_user_to_register_if_they_enter_valid_data()
    {
        $data = [
            'first_name' => 'Test',
            'last_name' => 'Test',
            'phone' => '6261231234',
            'email' => 'test@test.com',
            'username' => 'tester',
            'birthdate' => '2016-01-01',
            'password' => 'secret',
            'password_confirmation' => 'secret'
        ];

        $this->post('/register', $data);

        $this->seeInDatabase('users', [
            'email' => 'test@test.com'
        ]);

    }
}
