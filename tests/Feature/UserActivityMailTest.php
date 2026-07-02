<?php

use App\Mail\UserActivityNotification;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->actingAs(User::factory()->create());
});

it('emails the admin when a user is created', function () {
    Mail::fake();

    $this->post(route('users.store'))->assertRedirect(route('home'));

    Mail::assertSent(UserActivityNotification::class, function (UserActivityNotification $mail) {
        return $mail->action === 'created'
            && $mail->hasTo(config('mail.admin_address'));
    });
});

it('emails the admin when a user is deleted', function () {
    Mail::fake();

    $user = User::factory()->create();

    $this->delete(route('users.destroy', $user))->assertRedirect(route('home'));

    Mail::assertSent(UserActivityNotification::class, function (UserActivityNotification $mail) use ($user) {
        return $mail->action === 'deleted'
            && $mail->user->is($user)
            && $mail->hasTo(config('mail.admin_address'));
    });
});
