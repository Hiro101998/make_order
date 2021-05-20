<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <title>打線組んでみた</title>
</head>
<body>
<div id="app">
<example-component>

</example-component> 
</div>

<script>
let players = @json($players);

</script>
<script src="{{ mix('/js/app.js') }}">

</script>
</body>
</html>
