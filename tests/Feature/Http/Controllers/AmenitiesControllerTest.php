<?php

namespace Tests\Feature\Http\Controllers;

use App\Amenity;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AmenitiesController
 */
class AmenitiesControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $amenities = factory(Amenities::class, 3)->create();

        $response = $this->get(route('amenity.index'));

        $response->assertOk();
        $response->assertViewIs('amenity.index');
        $response->assertViewHas('amenities');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('amenity.create'));

        $response->assertOk();
        $response->assertViewIs('amenity.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AmenitiesController::class,
            'store',
            \App\Http\Requests\AmenitiesStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $amenity = $this->faker->word;

        $response = $this->post(route('amenity.store'), [
            'amenity' => $amenity,
        ]);

        $amenities = Amenity::query()
            ->where('amenity', $amenity)
            ->get();
        $this->assertCount(1, $amenities);
        $amenity = $amenities->first();

        $response->assertRedirect(route('amenity.index'));
        $response->assertSessionHas('amenity.id', $amenity->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $amenity = factory(Amenities::class)->create();

        $response = $this->get(route('amenity.show', $amenity));

        $response->assertOk();
        $response->assertViewIs('amenity.show');
        $response->assertViewHas('amenity');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $amenity = factory(Amenities::class)->create();

        $response = $this->get(route('amenity.edit', $amenity));

        $response->assertOk();
        $response->assertViewIs('amenity.edit');
        $response->assertViewHas('amenity');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AmenitiesController::class,
            'update',
            \App\Http\Requests\AmenitiesUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $amenity = factory(Amenities::class)->create();
        $amenity = $this->faker->word;

        $response = $this->put(route('amenity.update', $amenity), [
            'amenity' => $amenity,
        ]);

        $response->assertRedirect(route('amenity.index'));
        $response->assertSessionHas('amenity.id', $amenity->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $amenity = factory(Amenities::class)->create();
        $amenity = factory(Amenity::class)->create();

        $response = $this->delete(route('amenity.destroy', $amenity));

        $response->assertRedirect(route('amenity.index'));

        $this->assertDeleted($amenity);
    }
}
