<x-guest-layout>
    <form method="POST" action="{{ route('virements.store') }}">
        @csrf

        <!-- Montant -->
        <div>
            <x-input-label for="montant" :value="__('Montant')" />
            <x-text-input id="montant" class="block mt-1 w-full" type="number" min="0" name="montant" :value="old('montant')" required autofocus />
            <x-input-error :messages="$errors->get('montant')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="motif" :value="__('Motif')" />
            <x-text-input id="motif" class="block mt-1 w-full" type="text" name="motif" :value="old('motif')" required autofocus />
            <x-input-error :messages="$errors->get('motif')" class="mt-2" />
        </div>


        <x-primary-button class="ms-3">
            {{ __('Valider') }}
        </x-primary-button>
    </form>
</x-guest-layout>
