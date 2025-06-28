<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 space-y-4">
    <x-ui.breadcrumbs>
        <x-ui.breadcrumbs.link href="/dashboard"
            >Dashboard</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link href="{{ route('dashboard.services.index') }}"
            >{{ __('crud.services.collectionTitle') }}</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link active
            >Edit {{ __('crud.services.itemTitle') }}</x-ui.breadcrumbs.link
        >
    </x-ui.breadcrumbs>

    <x-ui.toast on="saved"> Service saved successfully. </x-ui.toast>

    <div class="w-full text-gray-500 text-lg font-semibold py-4 uppercase">
        <h1>Edit {{ __('crud.services.itemTitle') }}</h1>
    </div>

    <div class="overflow-hidden border rounded-lg bg-white">
        <form class="w-full mb-0" wire:submit.prevent="save">
            <div class="p-6 space-y-3">
                <div class="w-full">
                    <x-ui.label for="vozilo_id"
                        >{{ __('crud.services.inputs.vozilo_id.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.select
                        wire:model="form.vozilo_id"
                        name="vozilo_id"
                        id="vozilo_id"
                        class="w-full"
                    >
                        <option value="">Select data</option>
                        @foreach ($vehicles as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </x-ui.input.select>
                    <x-ui.input.error for="form.vozilo_id" />
                </div>

                <div class="w-full">
                    <x-ui.label for="zaposleni_id"
                        >{{ __('crud.services.inputs.zaposleni_id.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.select
                        wire:model="form.zaposleni_id"
                        name="zaposleni_id"
                        id="zaposleni_id"
                        class="w-full"
                    >
                        <option value="">Select data</option>
                        @foreach ($users as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </x-ui.input.select>
                    <x-ui.input.error for="form.zaposleni_id" />
                </div>

                <div class="w-full">
                    <x-ui.label for="admin_id"
                        >{{ __('crud.services.inputs.admin_id.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.select
                        wire:model="form.admin_id"
                        name="admin_id"
                        id="admin_id"
                        class="w-full"
                    >
                        <option value="">Select data</option>
                        @foreach ($users as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </x-ui.input.select>
                    <x-ui.input.error for="form.admin_id" />
                </div>

                <div class="w-full">
                    <x-ui.label for="status_id"
                        >{{ __('crud.services.inputs.status_id.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.select
                        wire:model="form.status_id"
                        name="status_id"
                        id="status_id"
                        class="w-full"
                    >
                        <option value="">Select data</option>
                        @foreach ($statuses as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </x-ui.input.select>
                    <x-ui.input.error for="form.status_id" />
                </div>

                <div class="w-full">
                    <x-ui.label for="naziv"
                        >{{ __('crud.services.inputs.naziv.label')
                        }}</x-ui.label
                    >
                    <x-ui.input.text
                        class="w-full"
                        wire:model="form.naziv"
                        name="naziv"
                        id="naziv"
                        placeholder="{{ __('crud.services.inputs.naziv.placeholder') }}"
                    />
                    <x-ui.input.error for="form.naziv" />
                </div>

                <div class="w-full">
                    <x-ui.label for="opis"
                        >{{ __('crud.services.inputs.opis.label') }}</x-ui.label
                    >
                    <x-ui.input.textarea
                        class="w-full"
                        wire:model="form.opis"
                        rows="6"
                        name="opis"
                        id="opis"
                        placeholder="{{ __('crud.services.inputs.opis.placeholder') }}"
                    />
                    <x-ui.input.error for="form.opis" />
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
