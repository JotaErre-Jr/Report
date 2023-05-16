<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Gerar relatório por parametro.</p>
    <form action="{{route('executar')}}" method="post" target="_blank">    
        @csrf
        <label for="">ID</label>
        <input type="text" name="get-id" id=""> 
        {{-- <input type="text" name="get-id2" id=""> --}}
        <input type="submit" value="enviar">
    </form>
</body>
</html>