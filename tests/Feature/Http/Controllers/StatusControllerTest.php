<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Status;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\StatusController
 */
final class StatusControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $statuses = Status::factory()->count(3)->create();

        $response = $this->get(route('statuses.index'));

        $response->assertOk();
        $response->assertViewIs('status.index');
        $response->assertViewHas('statuses');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('statuses.create'));

        $response->assertOk();
        $response->assertViewIs('status.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\StatusController::class,
            'store',
            \App\Http\Requests\StatusStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $naziv = fake()->word();

        $response = $this->post(route('statuses.store'), [
            'naziv' => $naziv,
        ]);

        $statuses = Status::query()
            ->where('naziv', $naziv)
            ->get();
        $this->assertCount(1, $statuses);
        $status = $statuses->first();

        $response->assertRedirect(route('statuses.index'));
        $response->assertSessionHas('status.id', $status->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $status = Status::factory()->create();

        $response = $this->get(route('statuses.show', $status));

        $response->assertOk();
        $response->assertViewIs('status.show');
        $response->assertViewHas('status');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $status = Status::factory()->create();

        $response = $this->get(route('statuses.edit', $status));

        $response->assertOk();
        $response->assertViewIs('status.edit');
        $response->assertViewHas('status');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\StatusController::class,
            'update',
            \App\Http\Requests\StatusUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $status = Status::factory()->create();
        $naziv = fake()->word();

        $response = $this->put(route('statuses.update', $status), [
            'naziv' => $naziv,
        ]);

        $status->refresh();

        $response->assertRedirect(route('statuses.index'));
        $response->assertSessionHas('status.id', $status->id);

        $this->assertEquals($naziv, $status->naziv);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $status = Status::factory()->create();

        $response = $this->delete(route('statuses.destroy', $status));

        $response->assertRedirect(route('statuses.index'));

        $this->assertModelMissing($status);
    }
}
