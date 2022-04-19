<div>


    <x-card>
        <img class="w-full rounded-md my-3" src="{{ $post->getImageUrl() }}">
        <h4 class="text-5xl mb-3 text-center">{{ $post->title }}</h4>

        <p>
            <span class="tracking-widest ml-3 text-sm text-gray-500 italic sm:p-1 font-bold uppercase">
                {{ $post->date->format('d-m-Y') }}
            </span>
            <span class="bg-purple-600 rounded py-1 px-2 text-white">{{ $post->category->title }}</span>
        </p>

        @if ($post->type == "post")
            @livewire('shop.cart')
        @endif
        

        <div class="mt-5">{!! $post->content !!}</div>


        <hr class="my-8">

        @livewire('contact.general',['subject' => "#$post->id - "])

    </x-card>

</div>
