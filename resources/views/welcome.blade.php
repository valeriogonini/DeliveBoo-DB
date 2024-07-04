@extends('layouts.app')
@section('content')
<head>
    <style>
body {
	font-family: Arial, sans-serif;
	margin: 0;
	padding: 0;
}
a {
	text-decoration: none;
	color: inherit;
}

.container-header {
	max-width: 1200px;
	margin: 0 auto;
	padding: 20px;
}

.header {

	text-align: center;
}

.footer {
	background-color: #333;
	color: white;
	text-align: center;
	padding: 10px 0;
	position: fixed;
	bottom: 0;
	width: 100%;
}

.btn-cream {
	display: flex;
	flex-direction: column;
	align-items: center;
	border-radius: 20px;
	
	background-color: #F4EFE7;
	width: 110px;
	padding: 10px;
	cursor: pointer;

}

.btn-cream:hover {
	background-color: #FAAF4D
}
.main-center{
    text-align: center
}
    </style>
</head>
<body>

    <div class="container-header">
        <div class="header">
            <h1>Benvenuto su Deliveboo admin!</h1>
            <h2 class="p-header">Sei un ristoratore?</h2>
            <p>Entra a far parte del team Deliveboo, dove sicurezza, bellezza e praticità sono messi in primo piano. Avrai tutto sotto controllo in un'unica app, sempre a portata di mano.</p>
        </div>
        
    </div>
    <main>
        <div class="container">
           <div class="row">
                <div class="col-6 justify-content-center " >
                    <div class="d-flex justify-content-center">
                        <h3>Sei già nostro cliente?</h3>
                    
                    </div>
                    <div class="d-flex justify-content-center">
                         <a href="{{ route('login') }}" class="btn-cream">Accedi</a>  
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex justify-content-center">
                            <h3>Vuoi entrare a far parte del nostro Team?</h3>    
                    </div>
                    <div class="d-flex justify-content-center">
                           <a href="{{ route('register') }}" class="btn-cream">Registrati</a>
                             
                    </div>
                </div>
           </div>
        </div>
    </main>
    <div class="footer">
        <p>&copy; 2024 Nome del Sito. Tutti i diritti riservati.</p>
    </div>
    
</body>
</html>
@endsection