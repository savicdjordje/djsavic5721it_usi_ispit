<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Bill;
use App\Models\Usluga;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\BillController
 */
final class BillControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $bills = Bill::factory()->count(3)->create();

        $response = $this->get(route('bills.index'));

        $response->assertOk();
        $response->assertViewIs('bill.index');
        $response->assertViewHas('bills');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('bills.create'));

        $response->assertOk();
        $response->assertViewIs('bill.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BillController::class,
            'store',
            \App\Http\Requests\BillStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $usluga = Usluga::factory()->create();
        $cena = fake()->randomFloat(/** float_attributes **/);

        $response = $this->post(route('bills.store'), [
            'usluga_id' => $usluga->id,
            'cena' => $cena,
        ]);

        $bills = Bill::query()
            ->where('usluga_id', $usluga->id)
            ->where('cena', $cena)
            ->get();
        $this->assertCount(1, $bills);
        $bill = $bills->first();

        $response->assertRedirect(route('bills.index'));
        $response->assertSessionHas('bill.id', $bill->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $bill = Bill::factory()->create();

        $response = $this->get(route('bills.show', $bill));

        $response->assertOk();
        $response->assertViewIs('bill.show');
        $response->assertViewHas('bill');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $bill = Bill::factory()->create();

        $response = $this->get(route('bills.edit', $bill));

        $response->assertOk();
        $response->assertViewIs('bill.edit');
        $response->assertViewHas('bill');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BillController::class,
            'update',
            \App\Http\Requests\BillUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $bill = Bill::factory()->create();
        $usluga = Usluga::factory()->create();
        $cena = fake()->randomFloat(/** float_attributes **/);

        $response = $this->put(route('bills.update', $bill), [
            'usluga_id' => $usluga->id,
            'cena' => $cena,
        ]);

        $bill->refresh();

        $response->assertRedirect(route('bills.index'));
        $response->assertSessionHas('bill.id', $bill->id);

        $this->assertEquals($usluga->id, $bill->usluga_id);
        $this->assertEquals($cena, $bill->cena);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $bill = Bill::factory()->create();

        $response = $this->delete(route('bills.destroy', $bill));

        $response->assertRedirect(route('bills.index'));

        $this->assertModelMissing($bill);
    }
}
