<html>
    <head>
        <title>{{'Products'}}</title>
    </head>
    <body>
        <table>
            <thead>
                <tr>Name</tr>
                <tr>Description</tr>
                <tr>Price</tr>
                <tr>Stock</tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <br />
                    <tr>{{ $product->getName() }}  </tr>
                    <tr>{{ $product->getDescription() }}  </tr>
                    <tr>{{ $product->getPrice() }}  </tr>
                    <tr>{{ $product->getStock() }}  </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
