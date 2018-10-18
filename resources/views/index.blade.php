<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pest Helper</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
</head>

<body>
    <div class="flex-center position-ref full-height">

        <!--新增的地方-->
        <div class="card-body">
            <form method="POST" action="search">
                @csrf
                <div class="form-group row">
                    <input type="text" name="keyword">
                    <label for="searchType">類別:</label>
                    <select class="form-control" name="searchType">
                        <option value="area">全部</option>
                        <option value="pest">害蟲</option>
                        <option value="plant">植株</option>
                    </select>
                    <button type="submit">搜尋</button>
                    <br>
                    @foreach($keywordList as $keyword)
                    <tr>
                        <td>{{ $keyword->keyWord }}</td>
                    </tr>
                    @endforeach
                </div>
            </form>
        </div>

    </div>
</body>

</html>
