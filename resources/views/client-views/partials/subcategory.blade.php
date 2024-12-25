@if (!empty($sousCategories))
<ul class="vertical-menu category-menu sous-menu">
    @foreach ($sousCategories as $sousCategorie)
        <li>
            <a href="{{ route('afficher_Produits_Categorie', ['idCategorie' => $sousCategorie->id]) }}">{{ $sousCategorie->name }}</a>
            @if (!$sousCategorie->sousCategories->isEmpty())
                @include('client-views.partials.subcategory', [
                    'sousCategories' => $sousCategorie->sousCategories,
                ])
            @endif
        </li>
    @endforeach
</ul>
@endif
