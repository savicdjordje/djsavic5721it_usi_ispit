<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 space-y-4">
    <x-ui.breadcrumbs>
        <x-ui.breadcrumbs.link href="/dashboard"
            >Dashboard</x-ui.breadcrumbs.link
        >
        <x-ui.breadcrumbs.separator />
        <x-ui.breadcrumbs.link active
            >{{ __('crud.services.collectionTitle') }}</x-ui.breadcrumbs.link
        >
    </x-ui.breadcrumbs>

    <div class="flex justify-between align-top py-4">
        <x-ui.input
            wire:model.live="search"
            type="text"
            placeholder="Search {{ __('crud.services.collectionTitle') }}..."
        />

        @can('create', App\Models\Service::class)
        <a wire:navigate href="{{ route('dashboard.services.create') }}">
            <x-ui.button>New</x-ui.button>
        </a>
        @endcan
    </div>

    {{-- Delete Modal --}}
    <x-ui.modal.confirm wire:model="confirmingDeletion">
        <x-slot name="title"> {{ __('Delete') }} </x-slot>

        <x-slot name="content"> {{ __('Are you sure?') }} </x-slot>

        <x-slot name="footer">
            <x-ui.button
                wire:click="$toggle('confirmingDeletion')"
                wire:loading.attr="disabled"
            >
                {{ __('Cancel') }}
            </x-ui.button>

            <x-ui.button.danger
                class="ml-3"
                wire:click="delete({{ $deletingService }})"
                wire:loading.attr="disabled"
            >
                {{ __('Delete') }}
            </x-ui.button.danger>
        </x-slot>
    </x-ui.modal.confirm>

    {{-- Index Table --}}
    <x-ui.container.table>
        <x-ui.table>
            <x-slot name="head">
                <x-ui.table.header for-crud wire:click="sortBy('vozilo_id')"
                    >{{ __('crud.services.inputs.vozilo_id.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('zaposleni_id')"
                    >{{ __('crud.services.inputs.zaposleni_id.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('admin_id')"
                    >{{ __('crud.services.inputs.admin_id.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('status_id')"
                    >{{ __('crud.services.inputs.status_id.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('naziv')"
                    >{{ __('crud.services.inputs.naziv.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.header for-crud wire:click="sortBy('opis')"
                    >{{ __('crud.services.inputs.opis.label')
                    }}</x-ui.table.header
                >
                <x-ui.table.action-header>Actions</x-ui.table.action-header>
            </x-slot>

            <x-slot name="body">
                @forelse ($services as $service)
                <x-ui.table.row wire:loading.class.delay="opacity-75">
                    <x-ui.table.column for-crud
                        >{{ $service->vozilo_id }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $service->zaposleni_id }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $service->admin_id }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $service->status_id }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $service->naziv }}</x-ui.table.column
                    >
                    <x-ui.table.column for-crud
                        >{{ $service->opis }}</x-ui.table.column
                    >
                    <x-ui.table.action-column>
                        @can('update', $service)
                        <x-ui.action
                            wire:navigate
                            href="{{ route('dashboard.services.edit', $service) }}"
                            >Edit</x-ui.action
                        >
                        @endcan @can('delete', $service)
                        <x-ui.action.danger
                            wire:click="confirmDeletion({{ $service->id }})"
                            >Delete</x-ui.action.danger
                        >
                        @endcan
                    </x-ui.table.action-column>
                </x-ui.table.row>
                @empty
                <x-ui.table.row>
                    <x-ui.table.column colspan="7"
                        >No {{ __('crud.services.collectionTitle') }} found.</x-ui.table.column
                    >
                </x-ui.table.row>
                @endforelse
            </x-slot>
        </x-ui.table>

        <div class="mt-2">{{ $services->links() }}</div>
    </x-ui.container.table>
</div>
