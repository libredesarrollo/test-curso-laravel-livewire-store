<div>
    <x-card>
        <div class="grid grid-cols-2 gap-2 mb-3">
            <x-jet-input class="block w-full" type="text" wire:model="search" placeholder="Buscar por título" />
            <div class="grid grid-cols-2 gap-2">
                <x-jet-input class="block w-full" type="date" wire:model="from" placeholder="Fecha inicio" />
                <x-jet-input class="block w-full" type="date" wire:model="to" placeholder="Fecha Fin" />
            </div>
        </div>

        <div class="flex gap-2 mb-3">

            <select class="w-full" wire:model="type">
                <option value="">{{ __('Type') }}</option>
                <option value="adverd">adverd</option>
                <option value="post">post</option>
                <option value="courses">courses</option>
                <option value="movies">movies</option>
            </select>

            <select class="w-full" wire:model="category_id">
                <option value="">{{ __('Category') }}</option>
                @foreach ($categories as $c => $i)
                    <option value="{{ $i }}">{{ $c }}</option>
                @endforeach
            </select>
        </div>
    </x-card>

    <div class=" flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 mt-5">
        <div class="w-full sm:max-w-5xl overflow-hidden">
            @foreach ($posts as $p)
                <h4 class="text-4xl mb-3 text-center">{{ $p->title }}</h4>
                <h4 class="tracking-widest text-center text-sm text-gray-500 italic sm:p-1 font-bold uppercase">
                    {{ $p->date->format('d-m-Y') }}</h4>
                <img class="w-full rounded-md my-3" src="{{ $p->getImageUrl() }}">

                <p class="mx-4">{{ $p->description }}</p>

                <hr class="my-24">

            @endforeach
        </div>
    </div>

    {{ $posts->links() }}

</div>
