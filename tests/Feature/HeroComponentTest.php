<?php

namespace Tests\Feature\Livewire;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HeroComponentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_post()
    {
        $response = $this->post('/posts', [
            'email' => 'Post de Teste',
            'password' => 'Conteúdo do post de teste',
            'company_id' => 1,
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('posts', ['email' => 'Post de Teste']);
    }

}
