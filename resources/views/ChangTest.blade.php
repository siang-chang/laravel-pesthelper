<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- 導入 Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-3.3.7-dist/js/bootstrap.js') }}"></script>
    <!-- 導入客製化 css, js -->
    <link rel="stylesheet" href="{{ asset('css/color.css') }}">
    <title>PestHelper</title>
</head>

<body style="padding-top: 70px;">
    <header>
        <!-- 導覽列 navbar -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <!-- 行動版樣式 Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <!-- 漢堡條 -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse"
                        aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- logo & WebName -->
                    <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-home" aria-hidden="true" style="color: white;"></span></a>
                    <a class="navbar-brand" href="/" style="color: #ffffff;">蟲害小幫手</a>
                </div>
                <!-- 桌面版樣式 Collect the nav links, forms, and other content for toggling -->
                <div id="navbar-collapse" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><img src="img/icon/icon_search_24x24.png" alt="Search"></a></li>
                        <li><a href="#" style="color: #ffffff;">害蟲辨識</a></li>
                        <li><a href="#" style="color: #ffffff;">害蟲目錄</a></li>
                        <li><a href="#" style="color: #ffffff;">植株目錄</a></li>
                    </ul>
                    <form class="navbar-form navbar-right">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </header>
    <!-- 內容區塊 -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="row">
                    <h1 class="col-xs-12 col-sm-4" style="background-color:red">News</h1>
                    <h1 class="col-xs-12 col-sm-4" style="background-color:red">Blog</h1>
                    <h1 class="col-xs-12 col-sm-4" style="background-color:red">About</h1>
                </div>
            </div>
        </div>
        <button type="button" id="btnTest" class="btn btn-default">PestHelper</button>
        <script>
            // $("#btnTest").click(function(){
                // alert('PestHelper');
            // })
            $("#btnTest").on('click', function(){
                alert('PestHelperTest');
            })
        </script>
        <div id="alertTest" class="alert alert-warning alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Warning!</strong> Better check yourself, you're not looking too good.
        </div>
        <button type="button" id="closeBtn" class="btn btn-default" >
            close
        </button>
        <script>
            $('#closeBtn').on('click', function(){
                $('#alertTest').alert('close');
            })
            $('#alertTest').on('closed.bs.alert', function(){
                alert('消失了');
            })
        </script>
    </div>
</body>

</html>
