<x-guest-layout>
    <form method="POST" action="{{ route('dons.store') }}">
        @csrf


        <!-- Don -->
        <div class="mt-4">
            <label for="don_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select don</label>
            <select id="don_id" name="don_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Choose a don</option>
                @foreach ($dons as $don)
                    @if ($don->name != "Superuser")
                        <option value="{{ $don->id }}">{{ $don->descriptions }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <!-- Montant -->
        <div>
            <x-input-label for="montant" :value="__('Montant')" />
            <x-text-input id="montant" class="block mt-1 w-full" type="number" min="0" name="montant" :value="old('montant')" required autofocus />
            <x-input-error :messages="$errors->get('montant')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Envoyer') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
