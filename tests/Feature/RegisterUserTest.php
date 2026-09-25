<?php

use App\Models\User;
use App\Notifications\VerifyEmail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;

// this test class uses the RefreshDatabase trait to ensure that the database is refreshed after each test, providing a clean state for testing.
uses(RefreshDatabase::class);


// GET /auth/register
test('show the registration screen', function(){
    $response = $this->get(route('register'));

    $response->assertStatus(200);
});


// POST /auth/register
test('register a new user and dispatch the registered event', function(){

    Event::fake();


    $response = $this->post(route('register.store'), [
        'name' => 'John Doe',
        'email' => 'correo@correo10.com',
        'password' => 'Password1.',
        'password_confirmation' => 'Password1.',
    ]);

    $response->assertRedirect(route('verification.notice'));

    $user = User::where('email', 'correo@correo10.com')->first();

    expect($user)->not()->toBeNull();
    expect($user->name)->toBe('John Doe');
    expect($user->email)->toBe('correo@correo10.com');
    expect($user->hasVerifiedEmail())->toBeFalse();


    Event::assertDispatched(Registered::class);
});


// POST /auth/register with invalid or empty data
test('should validate required fields when the request body is empty', function(){
    $response = $this->post(route('register.store'), [

    ]);

    $response->assertSessionHasErrors([
        'name',
        'email',
        'password'
    ]);
});

// POST /auth/register with duplicate email
test('should validate unique email when the email already exists', function(){

    User::factory()->create([
        'email' => 'correo@correo10.com'
    ]);

    $response = $this->post(route('register.store'), [
        'name' => 'John Doe',
        'email' => 'correo@correo10.com',
        'password' => 'Password1.',
        'password_confirmation' => 'Password1.',
    ]);


    $response->assertRedirect();

    $response->assertSessionHasErrors([
        'email' => 'The email has already been taken.',
    ]);
});

// Email sent after registration
test('should send a verification email after successful registration', function(){

    Notification::fake();


    $response = $this->post(route('register.store'), [
        'name' => 'John Doe',
        'email' => 'correo@correo10.com',
        'password' => 'Password1.',
        'password_confirmation' => 'Password1.',
    ]);

    $user = User::where('email', 'correo@correo10.com')->first();

    Notification::assertSentTo($user, VerifyEmail::class);
});

// User verification after registration
test('verifies the user from a signed verification URL', function(){

    // create an unverified user using the UserFactory
    $user = User::factory()->unverified()->create();

    // generate a temporary signed URL for email verification.
    $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            [
                'id' => $user->id,
                'hash' => sha1($user->email),
            ]
        );

        // Simulate a GET request to the verification URL acting as the unverified User.
        $response = $this->actingAs($user)->get($verificationUrl);

        // Assert that user is now verified and redirected to the dashboard
        $response->assertRedirect(route('dashboard'));

        expect($user->hasVerifiedEmail())->toBeTrue();
});

// Access dashboard unverified user
test('not allow access to the dashboard for unverified users', function(){
    $user = User::factory()->unverified()->create();

    $response = $this->actingAs($user)->get(route('dashboard'));

    $response->assertRedirect(route('verification.notice'));

});

// Access dashboard verified user
test('should allow access to the dashboard for verified users', function(){
    $user = User::factory()->create([
        'email_verified_at' => now(),
    ]);

    $response = $this->actingAs($user)->get(route('dashboard'));

    $response->assertStatus(200);

});
