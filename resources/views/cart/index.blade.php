@include('layaouts') <!-- Assurez-vous que le chemin vers votre fichier de mise en page est correct -->

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="container">
    <table id="cart" class="table table-bordered">
        <thead>
            <tr>
                <th style="color: white;">Product</th>
                <th style="color: white;">Prix</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0 @endphp
            @if(session('cart'))
                @foreach(session('cart') as $id => $pizza)
                     
                    <tr rowId="{{ $id }}">
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"><img src="{{ 'storage/' . $pizza['image'] }}" class="card-img-top"/></div>
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $pizza['nom'] }} </h4>
                                    @if(isset($pizza['description']))
                                    <p>{{ $pizza['description'] }}</p>
                                @else
                                    <p>Description non disponible</p>
                                @endif
                                    {{--<p>{{$details['description']}}</p>--}}
                                </div>
                            </div>
                        </td>
                        <td data-th="Prix" style="color: white;">${{ $pizza['prix'] }}</td>
                        
                        
                        <td class="actions">
                            <a class="btn btn-outline-danger btn-sm delete-product" style="color: white;" ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                    @php $total += $pizza['prix'] @endphp
                @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <td>
                    <h2 class="text-right" style="color: white;">Total :</h2>
                </td>
                <td style="color: white;">${{ $total }}</td> <!-- Afficher le total ici -->
            </tr>
            <tr>
                
                <td colspan="5" class="text-right">
                    <a href="{{ url('/pizzeria') }}" class="btn btn-primary"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                    <a href="{{ route('reservations.create') }}" class="btn btn-danger">Checkout</a>
                </td>
                
            </tr>
        </tfoot>
    </table>
</div>
       
    @section('scripts')
    <script type="text/javascript">
       
       $(".edit-cart-info").change(function (e) {
    e.preventDefault();
    var ele = $(this);
    $.ajax({
        url: '{{ route('update.shopping.cart') }}', // Update this line
        method: "patch",
        data: {
            _token: '{{ csrf_token() }}', 
            id: ele.parents("tr").attr("rowId"), 
        },
        success: function (response) {
            window.location.reload();
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    // Sélectionnez tous les éléments avec la classe "delete-product"
    const deleteButtons = document.querySelectorAll('.delete-product');

    // Ajoutez un gestionnaire d'événements au clic de chaque bouton
    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Récupérez l'ID du produit à partir de l'attribut data-id
            const productId = this.getAttribute('data-id');

            // Envoyez une requête AJAX pour supprimer le produit
            fetch(`/delete-cart-product?id=${productId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}', // Assurez-vous d'inclure le jeton CSRF
                },
            })
            .then(response => response.json())
            .then(data => {
                // Traitez la réponse du serveur
                console.log(data);
                // Vous pouvez mettre à jour l'affichage ou effectuer d'autres actions nécessaires ici
            })
            .catch(error => console.error('Erreur lors de la suppression du produit :', error));
        });
    });
});
    </script>
    @endsection


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
