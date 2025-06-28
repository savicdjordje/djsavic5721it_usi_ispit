<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 space-y-4">
    <x-ui.breadcrumbs>
        <x-ui.breadcrumbs.link href="/dashboard"
            >Dashboard</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link href="{{ route('dashboard.bills.index') }}"
            >{{ __('crud.bills.collectionTitle') }}</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link active
            >Edit {{ __('crud.bills.itemTitle') }}</x-ui.breadcrumbs.link
        >
    </x-ui.breadcrumbs>

    <x-ui.toast on="saved"> Bill saved successfully. </x-ui.toast>

    <div class="w-full text-gray-500 text-lg font-semibold py-4 uppercase">
        <h1>Edit {{ __('crud.bills.itemTitle') }}</h1>
    </div>

    <div class="overflow-hidden border rounded-lg bg-white">
        <form class="w-full mb-0" wire:submit.prevent="save">
            <div class="p-6 space-y-3">
                <div class="w-full">
                    <x-ui.label for="usluga_id"
                        >{{ __('crud.bills.inputs.usluga_id.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.select
                        wire:model="form.usluga_id"
                        name="usluga_id"
                        id="usluga_id"
                        class="w-full"
                    >
                        <option value="">Select data</option>
                        @foreach ($services as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </x-ui.input.select>
                    <x-ui.input.error for="form.usluga_id" />
                </div>

                <div class="w-full">
                    <x-ui.label for="cena"
                        >{{ __('crud.bills.inputs.cena.label') }}</x-ui.label
                    >
                    <x-ui.input.number
                        class="w-full"
                        wire:model="form.cena"
                        name="cena"
                        id="cena"
                        placeholder="{{ __('crud.bills.inputs.cena.placeholder') }}"
                        step="1"
                    />
                    <x-ui.input.error for="form.cena" />
                </div>
            </div>

            <div class="flex justify-between mt-4 border-t border-gray-50 p-4">
                <div>
                    <!-- Other buttons here -->
                </div>
                <div>
                    <x-ui.button type="submit">Save</x-ui.button>
                </div>
            </div>
        </form>
    </div>
</div>
