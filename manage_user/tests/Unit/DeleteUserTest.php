<?php

namespace Tests\Unit;

use App\Enums\Message;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use Faker\Factory as Faker;

class DeleteUserTest extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;

    /**
     * @test
     * @return void
     */
    public function showDeleteUserConfirmModal() {
        $user = factory(User::class)->create();
        $response = $this->call('POST', '/delete-confirm', [
            'user_id' => $user->user_id
        ]);

        $this->assertEquals(200, $response->getStatusCode()); //check status code
        $response->assertSee($user->user_id);       //check that user is user need to edit
    }

    /**
     * @test
     * @return void
     */
    public function deleteUserSuccess() {
        $user = factory(User::class)->create();

        $response = $this->call('POST','/delete-complete', [
            'user_id' => $user->user_id
        ]);

        $this->assertEquals(200, $response->getStatusCode()); //check status code
        $response->assertDontSee($user->user_id);   //check that user information not display on view
        $this->assertSoftDeleted('users', [
            'user_id' => $user->user_id
        ]);   // check that user soft deleted in db
        $this->assertEquals(Message::DELETE_USER_SUCCESS, $response->original['message']);    //check message display

    }
}
