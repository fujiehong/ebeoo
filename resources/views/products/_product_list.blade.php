

@if (count($products))
    @foreach ($products as $product)

        <div class="masonry__item col-md-4" data-masonry-filter="{{ $product->category->name }}">
            <div class="product product--tile bg--secondary text-center">
                <a href="{{route('products.show',$product->id)}}">
                    <img alt="Image" src="{{$product->image}}" width="100%"/>
                </a>
                <a class="block" href="#">
                    <div>
                        <h5>{{$product->title}}</h5>
                        <span>{{$product->summary}}</span>
                    </div>
                    <div>
                        <span class="h4 inline-block">{{$product->original_price}}</span>
                    </div>
                </a>
            </div>
        </div>


        @if ( ! $product->last)
            <hr>
        @endif

    @endforeach



@else
    <div class="empty-block">暂无数据 ~_~ </div>
@endif
