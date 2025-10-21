<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon mini_blog</title>
</head>
<body>
        <h1>Nos articles</h1>
        <ul>
@foreach ($categories as $categorie)
 
    <div class="p-4 border rounded mb-2">
        <li class="text-xl font-bold"> <a href="">{{ $categorie['nom'] }}</a></li>
    <br></div>
@endforeach
</ul>
</body>
</html>