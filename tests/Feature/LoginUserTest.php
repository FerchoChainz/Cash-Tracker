<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

/* It has to be the same text in the validation coming from the Request
    Example: SignInRequest :
        'Email not found. Please check your email or register for an account.'
    Has to be exactly the same for: assertSessionHas($type, $message) method.
 */

uses(RefreshDatabase::class);

// GET /auth/login exists
test('show the login screen', function () {

    $response = $this->get(route('login'));

    $response->assertStatus(200);
});

// Logs in a user with correct credentials
test('login with correct credentials', function () {

    User::factory()->create([
        'email' => 'correo@correo10.com',
        'password' => bcrypt('Password1.'),
        'email_verified_at' => now(),
    ]);

    $response = $this->post(route('login.store'), [
        'email' => 'correo@correo10.com',
        'password' => 'Password1.',
    ]);

    $response->assertRedirect(route('dashboard'));
    $this->assertAuthenticated();
});

// Logs in a user with incorrect credentials
test('login with incorrect credentials', function(){

    User::factory()->create([
        'email' => 'correo@correo10.com',
        'password' => bcrypt('Password1.')
    ]);

    //
    $response = $this->from(route('login'))->post(route('login.store'), [
        'email' => 'correo@correo10.com',
        'password' => 'incorrect',
    ]);

    $response->assertRedirect(route('login'));
    $response->assertSessionHas('error', 'Invalid credentials. Please check your email and password and try again.');

    $this->assertGuest();

});

// Prevents unverified user from accessing dashboard
test('User with correct credentials but no verified', function(){

    User::factory()->unverified()->create([
        'email' => 'correo@correo10.com',
        'password' => bcrypt('Password1.'),
    ]);

    $response = $this->post(route('login.store'), [
        'email' => 'correo@correo10.com',
        'password' => 'Password1.',
    ]);

    $response->assertRedirect(route('dashboard'));
    $this->assertAuthenticated();

    $dashboardResponse = $this->get(route('dashboard'));
    $dashboardResponse->assertRedirect(route('verification.notice'));

});

// Not allow access if email is not verified
test('does not allow access to dashboard if email is not verified', function(){

    $user = User::factory()->create([
        'email_verified_at' => null
    ]);

    $response = $this->actingAs($user)->get(route('dashboard'));

    $response->assertRedirect(route('verification.notice'));
});


// Allow acces to dashboard the user has email verified
test('Allow the user access to dashboard who has email verified', function(){
    $user = User::factory()->create([
        'email_verified_at' => now()
    ]);


    $response = $this->actingAs($user)->get(route('dashboard'));

    $response->assertStatus(200);
});


// When user does not exist
test('fails when non exist user wants to login', function(){

    $response = $this->from(route('login'))->post(route('login.store'),
    [
        'email' => 'nonexist@correo.com',
        'password' => 'password'
    ]);

    $response->assertRedirect(route('login'));
    $response->assertSessionHasErrors([
        'email' => 'Email not found. Please check your email or register for an account.'
    ]);

    $this->assertGuest();
});
