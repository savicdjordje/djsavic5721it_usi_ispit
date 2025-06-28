<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Admin;
use App\Models\Service;
use App\Models\Status;
use App\Models\Vozilo;
use App\Models\Zaposleni;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ServiceController
 */
final class ServiceControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $services = Service::factory()->count(3)->create();

        $response = $this->get(route('services.index'));

        $response->assertOk();
        $response->assertViewIs('service.index');
        $response->assertViewHas('services');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('services.create'));

        $response->assertOk();
        $response->assertViewIs('service.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ServiceController::class,
            'store',
            \App\Http\Requests\ServiceStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $vozilo = Vozilo::factory()->create();
        $zaposleni = Zaposleni::factory()->create();
        $admin = Admin::factory()->create();
        $status = Status::factory()->create();
        $naziv = fake()->word();

        $response = $this->post(route('services.store'), [
            'vozilo_id' => $vozilo->id,
            'zaposleni_id' => $zaposleni->id,
            'admin_id' => $admin->id,
            'status_id' => $status->id,
            'naziv' => $naziv,
        ]);

        $services = Service::query()
            ->where('vozilo_id', $vozilo->id)
            ->where('zaposleni_id', $zaposleni->id)
            ->where('admin_id', $admin->id)
            ->where('status_id', $status->id)
            ->where('naziv', $naziv)
            ->get();
        $this->assertCount(1, $services);
        $service = $services->first();

        $response->assertRedirect(route('services.index'));
        $response->assertSessionHas('service.id', $service->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $service = Service::factory()->create();

        $response = $this->get(route('services.show', $service));

        $response->assertOk();
        $response->assertViewIs('service.show');
        $response->assertViewHas('service');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $service = Service::factory()->create();

        $response = $this->get(route('services.edit', $service));

        $response->assertOk();
        $response->assertViewIs('service.edit');
        $response->assertViewHas('service');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ServiceController::class,
            'update',
            \App\Http\Requests\ServiceUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $service = Service::factory()->create();
        $vozilo = Vozilo::factory()->create();
        $zaposleni = Zaposleni::factory()->create();
        $admin = Admin::factory()->create();
        $status = Status::factory()->create();
        $naziv = fake()->word();

        $response = $this->put(route('services.update', $service), [
            'vozilo_id' => $vozilo->id,
            'zaposleni_id' => $zaposleni->id,
            'admin_id' => $admin->id,
            'status_id' => $status->id,
            'naziv' => $naziv,
        ]);

        $service->refresh();

        $response->assertRedirect(route('services.index'));
        $response->assertSessionHas('service.id', $service->id);

        $this->assertEquals($vozilo->id, $service->vozilo_id);
        $this->assertEquals($zaposleni->id, $service->zaposleni_id);
        $this->assertEquals($admin->id, $service->admin_id);
        $this->assertEquals($status->id, $service->status_id);
        $this->assertEquals($naziv, $service->naziv);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $service = Service::factory()->create();

        $response = $this->delete(route('services.destroy', $service));

        $response->assertRedirect(route('services.index'));

        $this->assertModelMissing($service);
    }
}
