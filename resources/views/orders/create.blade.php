@extends('layouts.main')


@section('content')


<div class='background-element' id='background-element'></div>
  <div class='window'>
    <div class='custom-main-content'>
      <h2>Create Order</h2>
      <form id="create-order-form" action="{{ route('order.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name Order</label>
                <input type="text" name="name" class="form-control" id="name" value="" required>
            </div>

            <div class="form-group">
                <label for="price">Price Order</label>
                <input type="number" step="0.01" name="price" class="form-control" id="price" value="" required>
            </div>

            <button type="submit" class="btn btn-primary">Create order</button>
        </form> 
    </div>
  </div>


  <script>
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


@endsection