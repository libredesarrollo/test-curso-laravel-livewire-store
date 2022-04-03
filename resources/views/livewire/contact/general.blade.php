

<div>

    <div class="flex">
        <div x-data="{ active:@entangle('step') }" class="flex mx-auto flex-col sm:flex-row">
            <div class="step" :class="{ 'active': active == 1 }">
                STEP 1
            </div>
            <div class="step" :class="{ 'active': parseInt(active) == 2 }">
                STEP 2
            </div>
            <div class="step" :class="{ 'active': active == 3 }">
                STEP 3
            </div>
            <div x-text="$wire.step"> -</div>
            <div x-text="$wire.get('step')"></div>
        </div>
        
    </div>

    <div x-data>
        <button x-on:click="$wire.stepEvent()">Increment</button>
    </div>

    @if ($step == 1)
        <form wire:submit.prevent="submit">

            <x-jet-label for="">{{ _('Subject') }}</x-jet-label>
            <x-jet-input-error for="subject" />
            <x-jet-input class="block w-full" type="text" wire:model="subject" />

            <x-jet-label for="">{{ _('type') }}</x-jet-label>
            <x-jet-input-error for="type" />


            <select wire:model="type">
                <option value=""></option>
                <option value="company">{{ _('Company') }}</option>
                <option value="person">{{ _('Person') }}</option>
            </select>

            <x-jet-label for="">{{ _('Message') }}</x-jet-label>
            <x-jet-input-error for="message" />
            <textarea wire:model="message"></textarea>

            <x-jet-button type="submit">Enviar</x-jet-button>
        </form>
    @elseif ($step == 2)
        @livewire('contact.company')
    @elseif ($step == 2.5)
        @livewire('contact.person')
    @elseif ($step == 3)
        @livewire('contact.detail')
    @elseif ($step == 4)
        FIN
    @else
    @endif


</div>
