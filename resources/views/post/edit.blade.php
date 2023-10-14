<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Form tambah data post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="{{ route('post.update', $data->id) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('PUT')
                
                        <div>
                            <x-input-label for="judul" :value="__('Judul')" />
                            <x-text-input id="judul" name="judul" type="text" value="{{ $data->judul }}" class="mt-1 block w-full" required autofocus  />
                            <x-input-error class="mt-2" :messages="$errors->get('judul')" />
                        </div>
                
                        <div>
                            <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                            <x-text-input id="deskripsi" name="deskripsi" type="text" value="{{ $data->deskripsi }}" class="mt-1 block w-full"  required  />
                            <x-input-error class="mt-2" :messages="$errors->get('deskripsi')" />
                        </div>
                
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

