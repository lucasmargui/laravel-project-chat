import './bootstrap';


window.Echo.channel('orders')
    .listen('OrderCreated', (event) => {
        console.log('Novo pedido:', event);
    });