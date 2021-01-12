@if (count($products))
    @foreach ($products as $product)

        <li class="col-md-3 col-12">
            <div class="product">
                <a href="{{route('sbb.products.show',$product->id)}}">
                    <img alt="Image" src="{{ URL::asset($product->image) }}" width="100%"/>
                </a>
                <a class="block" href="{{route('sbb.products.show',$product->id)}}">
                    <div>
                        <h5>{{$product->title}}</h5>

                    </div>
                    <div>
                        <span class="h4 inline-block"><i class="fa fa-jpy" aria-hidden="true"></i> {{$product->original_price}}</span>

                    </div>
                </a>
            </div>
        </li>


    @endforeach



@else
    <div class="empty-block">暂无数据 ~_~ </div>
@endif
