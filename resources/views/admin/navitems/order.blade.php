@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <h2>Liste des éléments de la navbar</h2>

        <ul id="sortable" class="list-group">
            @foreach ($navItems as $navItem)
                <li class="list-group-item" data-id="{{ $navItem->id }}">
                    <span>{{ $navItem->label }}</span>
                    <a href="{{ route('admin.navitems.edit', $navItem->id) }}"
                        class="btn btn-warning btn-sm float-right ml-2">Modifier</a>
                    <form action="{{ route('admin.navitems.destroy', $navItem->id) }}" method="POST" class="float-right">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </li>
            @endforeach
        </ul>

    </div>

    <!-- Ajouter la bibliothèque Sortable.js -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.6/Sortable.min.js"></script>
    <script>
        // Initialisation de Sortable.js pour rendre la liste réorganisable
        const sortable = new Sortable(document.getElementById('sortable'), {
            handle: '.handle', // Optionnel: définis un handle si tu veux spécifier un élément de la ligne pour déplacer (par exemple, un bouton)
            onEnd(evt) {
                // Appeler une méthode pour enregistrer l'ordre
                const order = [];
                document.querySelectorAll('#sortable li').forEach((item, index) => {
                    order.push({
                        id: item.getAttribute('data-id'),
                        order: index + 1
                    });
                });

                // Envoyer l'ordre via AJAX
                fetch("{{ route('admin.navitems.updateOrder') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content')
                        },
                        body: JSON.stringify({
                            order
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                    })
                    .catch(error => console.error("Erreur lors de la réorganisation :", error));
            }
        });
    </script>
@endsection
