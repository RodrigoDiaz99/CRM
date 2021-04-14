<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        <div>
            {{ __('Datos de Envio') }}
        </div>

    </x-slot>

    <x-slot name="description">

        {{ __('Actualiza tu información de envio, por ejemplo: direcciones de entrega o datos de contacto como telefono celular.') }}

    </x-slot>

    <x-slot name="form">
        
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-primary-button  wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-primary-button>
    </x-slot>

</x-jet-form-section>