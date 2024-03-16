<?php

namespace Tests\Feature;

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
    public function user_can_login_with_valid_credentials() {
        // Creamos un usuario
        $user = User::create([
            'name' =>'test1234',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        Auth::shouldReceive('guard')->andReturnSelf();

        // Simulamos la autenticación
        Auth::shouldReceive('attempt')
            ->once()
            ->with(['email' => 'test@example.com', 'password' => 'password'])
            ->andReturn(true);

        // Ejecutamos el componente Livewire
        Livewire::test(LoginForm::class)
            ->set('email', 'test@example.com')
            ->set('password', 'password')
            ->call('login')
            ->assertRedirect('/home');

        Auth::shouldReceive('user')->andReturn($user);

        // Verificamos que el usuario esté autenticado
        $this->assertAuthenticatedAs($user);
    }

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
       // Simulamos la autenticación fallida
       Auth::shouldReceive('attempt')
       ->once()
       ->andReturn(true);

        // Ejecutamos el componente Livewire
        Livewire::test(LoginForm::class)
       ->set('email', 'test@example.com')
       ->set('password', 'wrong_password')
       ->call('login')
       ->assertRedirect('/home')
       ->assertSessionHasErrors(['email']);
    }
}
