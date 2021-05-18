@foreach($categories as $category)
<div class="category_elem">
    <div class="cat-image">
        <img src="{{ $category->getImage() }}" alt="">
    </div>
    <p class="orderByCategory" data-slug="{{ $category->slug }}"><a href="{{ route('category.show', ['category' => $category->slug]) }}">{{ $category->title }}</a></p>
@if(count($category->categories))
    <button class="child-button" data-category="{{ $category->id }}">
        <span class="button-hor" data-category="{{ $category->id }}"></span>
        <span class="button-ver" data-category="{{ $category->id }}"></span>
    </button>
</div>
<div class="childs_category" id="childs_category" data-category="{{ $category->id }}">
    @foreach($category->categories as $childCategory)
    <div class="child_elem">
        <p class="orderByCategory" data-slug="{{ $childCategory->slug }}"><a href="{{ route('category.show', ['category' => $childCategory->slug]) }}">{{ $childCategory->title }}</a></p>
    </div>
    @endforeach
</div>
@else
</div>
@endif
@endforeach