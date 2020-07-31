<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Pizza;

class PizzaTest extends TestCase
{   
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetPizzas()
    {   
        $pizza = factory(Pizza::class)->create();
        $response = $this->json('GET', '/api/pizza');

        $response->assertStatus(200)
                 ->assertJsonEstructure([
                    'title', 'description', 'price', 'image'
                 ]);
    }
}