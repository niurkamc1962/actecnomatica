<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Información del Perfil') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Actualice la información de su cuenta y la dirección de correo.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span class="block rounded-full w-20 h-20"
                          x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Seleccione una foto') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Eliminar foto') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Nombre') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Correo') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" readonly />
        </div>
        
        <!-- Cargo -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="cargo" value="{{ __('Cargo') }}" />
            <x-jet-input id="cargo" type="text" class="mt-1 block w-full" wire:model.defer="state.cargo" />
        </div>
        
        <!-- Empresa -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="empresa" value="{{ __('Empresa') }}" />
            <x-jet-input id="empresa" type="text" class="mt-1 block w-full" wire:model.defer="state.empresa" />
        </div>
        
        <!-- REEUP -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="reeup" value="{{ __('REEUP') }}" />
            <x-jet-input id="reeup" type="text" class="mt-1 block w-full" wire:model.defer="state.reeup" />
        </div>
        
        <!-- telefonofijo -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="telefonofijo" value="{{ __('Telefono fijo') }}" />
            <x-jet-input id="telefonofijo" type="text" class="mt-1 block w-full" wire:model.defer="state.telefonofijo" />
        </div>
        
        <!-- telefonomovil -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="telefonomovil" value="{{ __('Telefono Movil') }}" />
            <x-jet-input id="telefonomovil" type="text" class="mt-1 block w-full" wire:model.defer="state.telefonomovil" />
        </div>
        
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Salvado.') }}
        </x-jet-action-message>

        <x-jet-button class="bg-tecnomatica-dark" wire:loading.attr="disabled" wire:target="photo">
            {{ __('Salvar') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
