<div>
    @push('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        Livewire.on('addedToCart', function(message) {
            toastr.success("Product success added to cart");
        });
    </script>
@endpush
@push('css')

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endpush
    <div id="collection_card" class="relative flex flex-wrap justify-center items-center min-h-[100vh]">
        @forelse($products as $product)
        <div class="box">
            <h2 class="name font-semibold">{{$product->product_name}}</h2>
            <h2 class="price font-semibold">Rp.{{ number_format($product->price, 2, ',', '.') }}</h2>
            <a href="/user/product/{{$product->id}}" class="buy">Buy Now</a> 
            @php
            $image = $producsimage->where('product_id', $product->id)->first();
        @endphp
            <img src="/uploads/product_images/{{ $image->image_name }}" alt="Sepatu" class="shoes">
        </div>
        @empty 
        <div class="col-12 mt-10">
            <div class="alert alert-info">
                <h4 class="alert-heading">Product Not Found</h4>
                <p>
                    <a href="{{ route('user.home') }}" class="alert-link">Back to Home</a>
                </p>
            </div>
        </div>
        @endforelse
    </div>
 <!-- Shop Pagination -->
 {{ $products->links() }}
 <!-- End Shop Pagination -->
</div>
