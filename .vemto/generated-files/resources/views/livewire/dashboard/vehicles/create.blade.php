<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 space-y-4">
    <x-ui.breadcrumbs>
        <x-ui.breadcrumbs.link href="/dashboard"
            >Dashboard</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link href="{{ route('dashboard.vehicles.index') }}"
            >{{ __('crud.vehicles.collectionTitle') }}</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link active
            >Create {{ __('crud.vehicles.itemTitle') }}</x-ui.breadcrumbs.link
        >
    </x-ui.breadcrumbs>

    <div class="w-full text-gray-500 text-lg font-semibold py-4 uppercase">
        <h1>Create {{ __('crud.vehicles.itemTitle') }}</h1>
    </div>

    <div class="overflow-hidden border rounded-lg bg-white">
        <form class="w-full mb-0" wire:submit.prevent="save">
            <div class="p-6 space-y-3">
                <div class="w-full">
                    <x-ui.label for="klijent_id"
                        >{{ __('crud.vehicles.inputs.klijent_id.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.select
                        wire:model="form.klijent_id"
                        name="klijent_id"
                        id="klijent_id"
                        class="w-full"
                    >
                        <option value="">Select data</option>
                        @foreach ($users as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </x-ui.input.select>
                    <x-ui.input.error for="form.klijent_id" />
                </div>

                <div class="w-full">
                    <x-ui.label for="registarski_broj"
                        >{{ __('crud.vehicles.inputs.registarski_broj.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.text
                        class="w-full"
                        wire:model="form.registarski_broj"
                        name="registarski_broj"
                        id="registarski_broj"
                        placeholder="{{ __('crud.vehicles.inputs.registarski_broj.placeholder') }}"
                    />
                    <x-ui.input.error for="form.registarski_broj" />
                </div>

                <div class="w-full">
                    <x-ui.label for="marka"
                        >{{ __('crud.vehicles.inputs.marka.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.text
                        class="w-full"
                        wire:model="form.marka"
                        name="marka"
                        id="marka"
                        placeholder="{{ __('crud.vehicles.inputs.marka.placeholder') }}"
                    />
                    <x-ui.input.error for="form.marka" />
                </div>

                <div class="w-full">
                    <x-ui.label for="model"
                        >{{ __('crud.vehicles.inputs.model.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.text
                        class="w-full"
                        wire:model="form.model"
                        name="model"
                        id="model"
                        placeholder="{{ __('crud.vehicles.inputs.model.placeholder') }}"
                    />
                    <x-ui.input.error for="form.model" />
                </div>

                <div class="w-full">
                    <x-ui.label for="godina_proizvodnje"
                        >{{ __('crud.vehicles.inputs.godina_proizvodnje.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.number
                        class="w-full"
                        wire:model="form.godina_proizvodnje"
                        name="godina_proizvodnje"
                        id="godina_proizvodnje"
                        placeholder="{{ __('crud.vehicles.inputs.godina_proizvodnje.placeholder') }}"
                        step="1"
                    />
                    <x-ui.input.error for="form.godina_proizvodnje" />
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
