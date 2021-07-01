@if ($parent_category->parentCategory)
    @include('admin.categories.parent_category', ['parent_category' => $parent_category->parentCategory])
@endif
{{ $parent_category->title }} /
