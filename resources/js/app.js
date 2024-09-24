import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();


window.Echo.channel('orders')
    .listen('OrderCreated', (e) => {
        console.log(e);
    });
