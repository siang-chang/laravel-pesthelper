        <!-- 影像辨識區塊 -->
        <div class="container recognition cta">
            <form action="recognition" method="POST" enctype="multipart/form-data" class="text-medium-0">
                @csrf


                <!-- 上傳影像 -->
                <div class="btn-1">
                    <span>上傳影像</span>
                    <input type="file" id="uploadImg" name="userImg" accept="image/*">
                </div>

                <!-- hidden PC -->
                <span class="hidden-md hidden-lg" style="margin: 15px;"></span>

                <!-- 拍攝影像 hidden PC -->
                <div class="btn-0 text-medium-1 hidden-md hidden-lg">
                    <span>拍攝影像</span>
                    <input type="file" id="shootImg" name="userImg" accept="image/*" capture="camera">
                </div>
            </form>

            <!-- 行動呼籲區塊 -->
            <div class="row hidden-xs hidden-sm">
                <h2 class="col-xs-12 text-medium-2" style="margin-top:30px;">您也可以透過行動裝置瀏覽網頁，使用即時辨識功能</h2>
            </div>
        </div>

        <!-- 導入 camera.js 相機上傳模組 -->
        <script src="{{ asset('js/camera.js') }}"></script>
        <!-- 生成 csrf token 供 javascript 使用 -->
        <script>
            var _token = '@csrf';
        </script>
        <!-- 影像辨識區塊 結束 -->
