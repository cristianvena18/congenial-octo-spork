<html>
    <head>
        <title>{{'Create Product'}}</title>
    </head>
    <body>
        <form action="{{route('storeProduct')}}" method="POST">
            <input name="name" required />
            <input name="description" required />
            <input name="price" type="number" required />
            <input name="stock" type="number" required />
            <input type="submit" />
        </form>
    </body>
</html>
