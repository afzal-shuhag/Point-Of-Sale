
@php
  $categories = App\Ecategory::all();
@endphp

<div class="list-group">
  @foreach($categories as $category)
    <a href=" {{ route('frontend.product.cat',$category->id) }} " class="list-group-item list-group-item-action">
      {{ $category->name }}
    </a>
  @endforeach
</div>
