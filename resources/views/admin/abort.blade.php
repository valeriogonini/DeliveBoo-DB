<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/js/app.js'])
</head>

<body>
    <div class="container">
        <div class="d-flex flex-column justify-content-center align-items-center gap-4 vh-100">
            <img src="https://blog.apify.com/content/images/size/w1200/2022/12/403.jpg" alt="">
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h1>Oops!</h1>
                <h3>Non hai l'autorizzazione per fare questo....</h3>
                <a class="btn btn-warning" href="{{url('/')}}">TORNA ALLA HOME PAGE</a>
            </div>
        </div>
    </div>
</body>

<style>
    img {
        width: 700px;
    }
</style>

</html>