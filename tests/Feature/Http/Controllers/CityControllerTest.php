<?php

namespace Tests\Feature\Http\Controllers;

use App\City;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CityController
 */
class CityControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $cities = factory(City::class, 3)->create();

        $response = $this->get(route('city.index'));

        $response->assertOk();
        $response->assertViewIs('city.index');
        $response->assertViewHas('cities');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('city.create'));

        $response->assertOk();
        $response->assertViewIs('city.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CityController::class,
            'store',
            \App\Http\Requests\CityStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $city = $this->faker->word;

        $response = $this->post(route('city.store'), [
            'city' => $city,
        ]);

        $cities = City::query()
            ->where('city', $city)
            ->get();
        $this->assertCount(1, $cities);
        $city = $cities->first();

        $response->assertRedirect(route('city.index'));
        $response->assertSessionHas('city.id', $city->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $city = factory(City::class)->create();

        $response = $this->get(route('city.show', $city));

        $response->assertOk();
        $response->assertViewIs('city.show');
        $response->assertViewHas('city');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $city = factory(City::class)->create();

        $response = $this->get(route('city.edit', $city));

        $response->assertOk();
        $response->assertViewIs('city.edit');
        $response->assertViewHas('city');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CityController::class,
            'update',
            \App\Http\Requests\CityUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $city = factory(City::class)->create();
        $city = $this->faker->word;

        $response = $this->put(route('city.update', $city), [
            'city' => $city,
        ]);

        $response->assertRedirect(route('city.index'));
        $response->assertSessionHas('city.id', $city->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $city = factory(City::class)->create();

        $response = $this->delete(route('city.destroy', $city));

        $response->assertRedirect(route('city.index'));

        $this->assertDeleted($city);
    }
}
