<?php

namespace Tests\Unit;

use App\Enums\Message;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class EditUserTest extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;

    /**
     * @test
     * @return void
     */
    public function showFormEditUser() {
        $user = factory(User::class)->create();
        $response = $this->call('POST', '/edit', [
            'user_id' => $user->user_id
        ]);
        $this->assertEquals(200, $response->getStatusCode()); //check status code
        $response->assertSee($user->user_id);       //check that user is user need to edit
    }

    /**
     * @test
     * @return void
     */
    public function editUserWithInvalidInputs() {
        $response = $this->call('POST','/edit-complete', [
            'user_name' => '',
            'email' => 'email'
        ]);
        $this->assertEquals(302, $response->getStatusCode());
    }

    /**
     * @test
     * @return void
     */
    public function editUserSuccess() {
        $faker = Faker::create();
        $user = factory(User::class)->create();
        $data = [
            'user_id' => $user->user_id,
            'user_name' => $faker->name,
            'email' => $faker->safeEmail,
            'role' => \App\Enums\Role::USER
        ];

        $response = $this->call('POST','/edit-complete', $data);
        $this->assertEquals(200, $response->getStatusCode()); //check status code
        $response->assertSee($data['user_name'], $data['email']);   //check that user information changed on view
        $this->assertDatabaseHas('users', $data);   // check that user updated in db
        $this->assertEquals(Message::EDIT_USER_SUCCESS, $response->original['message']);    //check message display

    }
}
