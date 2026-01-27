<!DOCTYPE html>
<html>
<head>
  <title>Shopify App Integration</title>
</head>
<body>
  <h1>Products from Shopify</h1>

  <ul>
    @forelse($products as $product)
      <li>
        <h2>{{ $product['title'] }}</h2>
        <p><strong>Vendor:</strong> {{ $product['vendor'] }}</p>
        <p><strong>Type:</strong> {{ $product['product_type'] }}</p>
        <p><strong>Description:</strong> {!! $product['body_html'] !!}</p>

        @if(isset($product['images'][0]['src']))
          <img src="{{ $product['images'][0]['src'] }}" alt="{{ $product['title'] }}" width="200">
        @endif

        @if(isset($product['variants'][0]['price']))
          <p><strong>Price:</strong> ${{ $product['variants'][0]['price'] }}</p>
        @endif
      </li>
    @empty
      <li>No products found.</li>
    @endforelse
  </ul>
</body>
</html>
