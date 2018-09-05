<?php

namespace Tests\Unit;

use App\Enums\Message;
use Faker\Factory as Faker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddUserTest extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;

    private function generateFakerData() {
        $faker = Faker::create();
        return $data = [
            'user_name' => $faker->name,
            'email' => $faker->safeEmail,
            'user_id' => $faker->randomAscii,
            'password' => 'secret',
            'confirm_password' => 'secret',
            'role' => \App\Enums\Role::USER
        ];
    }

    /**
     * @test
     * @return void
     */
    public function addUserWithoutInputs() {
        $response = $this->call('POST','/add', [
            'user_name' => '',
            'email' => '',
            'user_id' => '',
            'password' => '',
            'confirm_password' => ''
        ]);
        $this->assertEquals(302, $response->getStatusCode());
    }

    /**
     * @test
     * @return void
     */
    public function addUserWithInvalidEmail() {
        $data = self::generateFakerData();
        $data['email'] = 'invalid email';

        $response = $this->call('POST','/add', $data);
        $this->assertEquals(302, $response->getStatusCode());
    }

    /**
     * @test
     * @return void
     */
    public function addUserWithPasswordNotMatch() {
        $data = self::generateFakerData();
        $data['confirm_password'] = 'password_not_match';

        $response = $this->call('POST','/add', $data);
        $this->assertEquals(302, $response->getStatusCode());
    }

    /**
     * @test
     * @return void
     */
    public function addUserSuccess() {
        $data = self::generateFakerData();

        $response = $this->call('POST','/add', $data );
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertDatabaseHas('users', [
            'user_name' => $data['user_name'],
            'email' => $data['email'],
            'user_id' => $data['user_id'],
            'role' => $data['role']
        ]);   //check that user add success to db

        $this->assertEquals(Message::ADD_USER_SUCCESS, $response->original['message']);  //check message display
        $response->assertSeeText($data['user_id']); // check that user display on view
    }
}
