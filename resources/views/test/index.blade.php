<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body class="scroll">
    <div id="awal">
        <div class="tema">
            <p class="text-center" style="padding-top:20px ; color: #CC84C0;">You Are Invited</p>
            <h2 class="text-center text-uppercase " style="padding-top:20px ; color: #CC84C0;">birthday party</h2>
            <h2 class="text-center text-uppercase" style=" color: #CC84C0;">Naura ayu</h2>
            <img src="image/gambar1.jpg" class=" mx-auto d-block my-3 picture">
            <button  type="button" id="open" class="klik1  mx-auto d-block my-5">Open Invitation</button>
        </div>
    </div>
    <div class="test">
        <div class="page-one">
            <p class="text-birthday text-center p-3" >Birthday Party Of</p>
            <img src="image/picture1.png" type="gambar" class="picture1 mx-auto d-block">
            <p class="text-name text-center">Naura Ayu</p>
            <p class="text-date text-center">15 Oktober 2022</p> 
        </div>
        <div class="page-one">
            <h3>haha</h3>
        </div>
    </div>
    <script>
         $(document).ready(function() {
            $('#open').click(function() {
                $('#awal').hide();
                $( "body" ).removeClass( "scroll" );
            })
        });
    </script>
</body>
</html>