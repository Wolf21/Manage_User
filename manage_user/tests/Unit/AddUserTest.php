<?php

namespace Tests\Unit;

use App\Enums\Message;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddUserTest extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;

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
        $response = $this->call('POST','/add', [
            'user_name' => 'user name',
            'email' => 'email',
            'user_id' => 'user ID',
            'password' => 'secret',
            'confirm_password' => 'secret'
        ]);
        $this->assertEquals(302, $response->getStatusCode());
    }

    /**
     * @test
     * @return void
     */
    public function addUserWithPasswordNotMatch() {
        $response = $this->call('POST','/add', [
            'user_name' => 'user name',
            'email' => 'email@gmail.com',
            'user_id' => 'user ID',
            'password' => 'secret',
            'confirm_password' => 'victoria_secret'
        ]);
        $this->assertEquals(302, $response->getStatusCode());
    }

    /**
     * @test
     * @return void
     */
    public function addUserSuccess() {
        $response = $this->call('POST','/add', [
            'user_name' => 'user name',
            'email' => 'email@gmail.com',
            'user_id' => 'user ID',
            'password' => 'secret',
            'confirm_password' => 'secret',
            'role' => \App\Enums\Role::USER
        ]);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertDatabaseHas('users', [
            'user_id' => 'user ID'
        ]);   //check that user add success to db

        $view = $response->original;
        $this->assertEquals(Message::ADD_USER_SUCCESS, $view['message']);  //check message display
        $response->assertSeeText('user ID'); // check that user display on view
    }
}
