@if($products->count() > 0)
Total Products: {{ $products->count() }}
@endif
@forelse ($products as $item)
    <div class="col-md-12">
        <h3>{{ $item->name }}</h3>
        <p>Price: {{ $item->price }}</p>
        <p>Upload Speed: {{ $item->upload_speed }}</p>
        <p>Download Speed: {{ $item->download_speed }}</p>
        <p>Technology: {{ $item->technology }}</p>
        <p>Static IP: {{ $item->type }}</p>
    </div>
@empty
    <p>No Products Found..</p>
@endforelse

