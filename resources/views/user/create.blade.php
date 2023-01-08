<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Registro</title>
</head>

<body>
    <div class="container mx-auto bg-primary-subtle mt-5">
        <h1 class="text-center">Registro</h1>
        <form method="post" action={{route("user.store")}}>
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Nombre" required name="name">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">correo</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="correo@ejemplo.com" required name="email">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">contraseña</label>
                <input type="password" class="form-control" id="exampleInputPassword1" required name="password">
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>


</body>

</html>
