<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-white p-8 rounded-lg shadow-lg w-84">

                    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                        <h2 class="text-2xl font-bold text-center mb-6">Create Order</h2>
                        <form id="create-order-form" action="{{ route('order.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                <input type="text" id="name" name="name" required
                                    class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 w-full">
                            </div>
                            <div class="mb-4">
                                <label for="order" class="block text-sm font-medium text-gray-700">Order</label>
                                <input type="order" id="order" name="order" required
                                    class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 w-full">
                            </div>
                            <button type="submit"
                                    class="w-full bg-blue-500 text-white font-bold py-2 rounded-md hover:bg-blue-600 transition duration-200">
                                Create
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script>

        document.addEventListener('DOMContentLoaded', () => {
            
            window.Echo.channel('orders')
            .listen('OrderCreated', (e) => {
                console.log(e);
            });
        });



        document.getElementById('create-order-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Previne o comportamento padrão de atualizar a página

            // Obtém os dados do formulário
            const formData = new FormData(this);

            // Envia a requisição usando Fetch API
            fetch(this.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(response => response.json()) // Transforma a resposta em JSON
            .then(data => {
                if (data.success) {
                    console.log('Order created successfully!');
                    // Aqui você pode adicionar lógica para atualizar a interface sem recarregar
                } else {
                    console.log('Failed to create order.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>

</x-app-layout>