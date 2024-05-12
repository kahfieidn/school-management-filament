<x-filament-panels::page>
    <form method="post" wire:submit="save">
        {{$this->form}}
        <x-filament::button class="mt-3" type="submit">
            Save
        </x-filament::button>

    </form>
</x-filament-panels::page>