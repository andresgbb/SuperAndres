<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class ShowingProductsTest extends TestCase{

    /**
     * Test to ensure products are shown on the products page.
     *
     * @return void
     */
    public function testShowingProducts(){

     $user = User::where('email', 'angabe@gmail.com')->first();

     $this->actingAs($user);

     $response = $this->get('/api/products');

     $response->assertStatus(200);

}

}

