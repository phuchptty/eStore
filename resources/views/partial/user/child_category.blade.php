<li @if(!$child_category->childrenCategories->isEmpty()) class="hassubs" @endif>
    <a href="#">{{ $child_category->title }}<i class="fas fa-chevron-right"></i></a>
    @if (!$child_category->childrenCategories->isEmpty())
        <ul>
            @foreach ($child_category->childrenCategories as $childCategory)
                @include('partial.user.child_category', ['child_category' => $childCategory])
            @endforeach
        </ul>
    @endif
</li>
