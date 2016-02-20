<!DOCTYPE html>
<html>
    <head>
        <title>在线留言</title>

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }
            
            h1,h5 {
                margin: 0;
            }
            
            .content {
                margin-top: 15px;
                text-indent: 15px;
                max-width: 700px;
            }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <h1>来自 {{ $name }} 的留言</h1>
            <h5>{{ $email }}</h5>
            <div class="content">
                {{ $mess }}
            </div>
        </div>
    </body>
</html>
