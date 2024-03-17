<?php

namespace Tests\Feature\Livewire;

use App\Livewire\LoginForm;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;
use Tests\TestCase;

class LoginFormTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function login_with_valid_credentials_redirects_to_home()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        Livewire::test(LoginForm::class)
            ->set('email', 'test@example.com')
            ->set('password', bcrypt('password'))
            ->call('login')
            ->assertRedirect('/home');

        $this->assertTrue(Auth::check());
    }

    /** @test */
    public function login_with_invalid_credentials_fails()
    {
        Livewire::test(LoginForm::class)
            ->set('email', 'invalidexample.com')
            ->set('password', 'invalidpassword')
            ->call('login');
            
            // Recuperar los errores de la sesión
            $errors = session('errors')->get('errors');

            // Verificar si los errores contienen el mensaje esperado
            $this->assertContains('These credentials do not match our records.', $errors);


        $this->assertFalse(Auth::check());
    }

    /** @test */
    public function login_requires_email()
    {
        Livewire::test(LoginForm::class)
            ->set('password', 'password')
            ->call('login')
            ->assertHasErrors(['email' => 'required']);
    }

    /** @test */
    public function login_requires_valid_email()
    {
        Livewire::test(LoginForm::class)
            ->set('email', 'invalidemail')
            ->set('password', 'password')
            ->call('login')
            ->assertHasErrors(['email' => 'email']);
    }

    /** @test */
    public function login_requires_password()
    {
        Livewire::test(LoginForm::class)
            ->set('email', 'test@example.com')
            ->call('login')
            ->assertHasErrors(['password' => 'required']);
    }

    /** @test */
    public function login_requires_minimum_password_length()
    {
        Livewire::test(LoginForm::class)
            ->set('email', 'test@example.com')
            ->set('password', 'short')
            ->call('login')
            ->assertHasErrors(['password' => 'min']);
    }
}
