<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Klijent;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\VehicleController
 */
final class VehicleControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $vehicles = Vehicle::factory()->count(3)->create();

        $response = $this->get(route('vehicles.index'));

        $response->assertOk();
        $response->assertViewIs('vehicle.index');
        $response->assertViewHas('vehicles');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('vehicles.create'));

        $response->assertOk();
        $response->assertViewIs('vehicle.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\VehicleController::class,
            'store',
            \App\Http\Requests\VehicleStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $klijent = Klijent::factory()->create();
        $registarski_broj = fake()->word();
        $marka = fake()->word();
        $model = fake()->word();
        $godina_proizvodnje = fake()->numberBetween(-10000, 10000);

        $response = $this->post(route('vehicles.store'), [
            'klijent_id' => $klijent->id,
            'registarski_broj' => $registarski_broj,
            'marka' => $marka,
            'model' => $model,
            'godina_proizvodnje' => $godina_proizvodnje,
        ]);

        $vehicles = Vehicle::query()
            ->where('klijent_id', $klijent->id)
            ->where('registarski_broj', $registarski_broj)
            ->where('marka', $marka)
            ->where('model', $model)
            ->where('godina_proizvodnje', $godina_proizvodnje)
            ->get();
        $this->assertCount(1, $vehicles);
        $vehicle = $vehicles->first();

        $response->assertRedirect(route('vehicles.index'));
        $response->assertSessionHas('vehicle.id', $vehicle->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $vehicle = Vehicle::factory()->create();

        $response = $this->get(route('vehicles.show', $vehicle));

        $response->assertOk();
        $response->assertViewIs('vehicle.show');
        $response->assertViewHas('vehicle');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $vehicle = Vehicle::factory()->create();

        $response = $this->get(route('vehicles.edit', $vehicle));

        $response->assertOk();
        $response->assertViewIs('vehicle.edit');
        $response->assertViewHas('vehicle');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\VehicleController::class,
            'update',
            \App\Http\Requests\VehicleUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $vehicle = Vehicle::factory()->create();
        $klijent = Klijent::factory()->create();
        $registarski_broj = fake()->word();
        $marka = fake()->word();
        $model = fake()->word();
        $godina_proizvodnje = fake()->numberBetween(-10000, 10000);

        $response = $this->put(route('vehicles.update', $vehicle), [
            'klijent_id' => $klijent->id,
            'registarski_broj' => $registarski_broj,
            'marka' => $marka,
            'model' => $model,
            'godina_proizvodnje' => $godina_proizvodnje,
        ]);

        $vehicle->refresh();

        $response->assertRedirect(route('vehicles.index'));
        $response->assertSessionHas('vehicle.id', $vehicle->id);

        $this->assertEquals($klijent->id, $vehicle->klijent_id);
        $this->assertEquals($registarski_broj, $vehicle->registarski_broj);
        $this->assertEquals($marka, $vehicle->marka);
        $this->assertEquals($model, $vehicle->model);
        $this->assertEquals($godina_proizvodnje, $vehicle->godina_proizvodnje);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $vehicle = Vehicle::factory()->create();

        $response = $this->delete(route('vehicles.destroy', $vehicle));

        $response->assertRedirect(route('vehicles.index'));

        $this->assertModelMissing($vehicle);
    }
}
