<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<div class="flex justify-left">   
        <div class="rounded-lg overflow-hidden shadow-2xl bg-white my-5 border-2 border-gray-800 border-opacity-25">
        	<h1><strong>Vintage Store CO</strong></h1>
        	<p>Libro seleccionado: {{$compra['nombre']}}</p>
        	<p>Pago a acordar con la tienda</p>
        	<p>
        		Numero de contacto: 02763572492<br>
        		WhatsApp: +584168724703<br>
        		Correo electronico: admin.vintage@gmail.com<br>
        	</p>
        	<p>Entrega: {{$compra['select1']}}</p>
        	<p>Cantidad de libros: {{$compra['select2']}}u</p>
        	<p>Precio a pagar: ${{$compra['precio'] * $compra['select2']}}</p>
        	<br><br><br><br>
        	<p>© 2021 Todos los derechos reservados.</p>
        </div>
    </div>
</body>
</html>