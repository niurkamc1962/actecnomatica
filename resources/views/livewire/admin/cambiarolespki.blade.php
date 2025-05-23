<div>
    <div class="flex flex-col">
        <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                    @if($error !== '')
                        <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4 bg-danger font-weight-bold">
                            {{$error}}
                        </div>
                    @else
                        <form>
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="mb-4">
                                    <label for="roles" class="block text-gray-700 text-md font-bold mb-2">Role:</label>
                                    <select name="role" id="role" wire:model.defer="role" class="py-1 px-1" required>
                                        <option value="" selected>Seleccione</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('role') <span class="font-weight-bold text-red">{{ $message }}</span>@enderror
                                </div>
                                <div class="mb-4">
                                        <div class="flex form-inline">
                                            <label for="ficherocsv"  class="block text-gray-700 text-sm font-bold mb-2 mr-2">Fichero CSV:</label>
                                            <input type="file" name="ficherocsv" id="ficherocsv"
                                                   class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                   wire:model="ficherocsv" required>
                                        </div>
                                        @error('ficherocsv') <span class="font-weight-bold text-red">{{ $message }}</span>@enderror
                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                        <button wire:click.prevent="procesarficherocsv()" type="submit"
                                                class="inline-flex items-center px-4 py-2 my-3 bg-green border border-solid rounded-3xl font-semibold text-md text-white">
                                            Procesar
                                        </button>
                                        <div wire:loading wire:target="procesarficherocsv">
                                            ... Procesando la información ...
                                        </div>
                                    </span>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>



