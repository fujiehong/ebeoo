
@if (count($products))
    @foreach ($products as $product)

        <div class="masonry__item col-md-3" >
            <div class="product product--tile bg--secondary text-center">
                <a href="{{route('sbb.products.show',$product->id)}}">
                    <img alt="Image" src="{{ URL::asset($product->image) }}" width="100%"/>
                </a>
                <a class="block" href="#">
                    <div>
                        <h5>{{$product->title}}</h5>
                        <span>{{$product->summary}}</span>
                    </div>
                    <div>
                        <span class="h4 inline-block"><i class="fa fa-jpy" aria-hidden="true"></i> {{$product->original_price}}</span>
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
