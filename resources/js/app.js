require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

// shopping cart

import toast from 'toast-me';
window.toast = toast
//toast('My message')

const options = {
    position: 'bottom'
}

Livewire.on('itemDelete', () => {
    toast("El item ha sido eliminado :(", options);
})
Livewire.on('itemAdd', (post) => {
    toast("El item ha sido agregado", options);
})
Livewire.on('itemChange', (post) => {
    toast("El item ha cambiado "+post.title, options);
})