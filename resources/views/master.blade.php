<!DOCTYPE html>
<html lang="en">

<head>
    <title>this is my mater page</title>
    <style></style>
    //aqui ira meta token
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <article>
        <header>
            <h1>this is my master page</h1>
        </header>
        <main>
            <button id='myajax'>click me</button>
        </main>
        <footer>
            Ejemplo propuesto en blastcoding.com
        </footer>
    </article>
    //pondre todos los script antes de cerrar la etiqueta body
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

    //(español)pon el $ajaxSetup aqui . (english) copy $.ajaxSetup here
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //(español)pon el $.ajax aqui . (english) copy $.ajax code here

        $('#myajax').click(function() {
            //we will send data and recive data fom our AjaxController
            $.ajax({
                url: 'miJqueryAjax',
                data: {
                    'name': "luis",
                    _token: $('input[name="csrf-token"]').val(),
                },
                type: 'post',
                success: function(response) {
                    alert(response);
                },
                statusCode: {
                    404: function() {
                        alert('web not found');
                    }
                },
                error: function(x, xs, xt) {
                    //nos dara el error si es que hay alguno
                    window.open(JSON.stringify(x));
                    //alert('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
                }
            });
        });
    </script>
</body>

</html>
