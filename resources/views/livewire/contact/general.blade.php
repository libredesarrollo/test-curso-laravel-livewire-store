<div>

    <form wire:submit.prevent="submit">

    <x-jet-label for="">{{ _("Subject") }}</x-jet-label>
    <x-jet-input-error for="subject" />
    <x-jet-input class="block w-full" type="text" wire:model="subject" />

    <x-jet-label for="">{{ _("type") }}</x-jet-label>
    <x-jet-input-error for="type" />
    
    
    <select wire:model="type">
        <option value="company">{{ _("Company") }}</option>
        <option value="person">{{ _("Person") }}</option>
    </select>

    <x-jet-label for="">{{ _("Message") }}</x-jet-label>
    <x-jet-input-error for="message" />
    <textarea wire:model="message"></textarea>

    <x-jet-button type="submit">Enviar</x-jet-button>
</form>


</div>
