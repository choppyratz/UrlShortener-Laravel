<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>URLShortener</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <style>
            * {
                margin: 0;
                padding: 0;
                font-family: sans-serif;
                box-sizing: border-box;
            }
            h1 {
                text-align: center;
                font-size: 80px;
                padding-top: 200px;
                color: #F96969;
            }
            .form-parent {
                display: flex;
                justify-content: center;
            }
            form {
                display: flex;
                flex-direction: column;
                align-items: center;
                width: 500px;
            }

            form>input {
                width: 100%;
                margin-top: 15px;
                padding: 7px;
                outline: none;
            }
            form>select {
                width: 100%;
                margin-top: 15px;
                padding: 7px;
                outline: none;
            }

            form>button {
                border: none !important;
                margin-top: 15px;
                width: 100%;
                padding: 10px;
                font-size:20px;
                cursor: pointer;
                background: #F96969;
                border-radius: 8px;
                color: white;
                outline: none;
            }

            form>button:hover {
                background: #f75454;
            }

            h3 {
                margin-top: 15px;
                font-weight: 100;
            }
        </style>
    </head>
    <body>
        <h1>Url Shortener</h1>
        <div class="form-parent">
            <form action="" id="form">
                @csrf
                <input type="text" placeholder="url" name="sourceUrl">
                <select name="expiresDate" id="">
                    <option value="0">expires date</option>
                    <option value="1">one hour</option>
                    <option value="2">one day</option>
                    <option value="3">one week</option>
                    <option value="4">one month</option>
                    <option value="5">one year</option>
                </select>
                <button type="submit">Cut</button>
                <h3></h3>
            </form>
        </div>
    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
        $('#form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST", 
                url: "/",
                data: $(this).serialize(),
                success: function(data) {
                    $('h3').html(data);
                }
            });
        });
    </script>
</html>
