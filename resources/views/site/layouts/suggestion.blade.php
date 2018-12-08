            <!-- suggestion Modal 修改建議視窗 -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <!-- 標題區塊 -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title text-Large-1" id="myModalLabel">提出建議</h4>
                        </div>

                        <!-- 內容區塊 -->
                        <div class="modal-body">
                            <form class="row textdata">
                                @csrf


                                <!-- 隱藏欄位 ｜ 害蟲 , 植株的編號 -->
                                <input type="hidden" name="num" id="num" value="{{ $pestData->num }}">

                                <!-- 害蟲 , 植株的名稱　預設載入，無法變更 -->
                                <div class="col-xs-12 col-md-10 col-md-offset-1 data">
                                    <div class="RoundBtn-1-5 text-medium-1">害蟲名稱</div><p>
                                    <input type="text" name="name" id="name" class="form-control text-medium-3" value="{{ $pestData->name }}" readonly="readonly">
                                </div>

                                <!-- 使用者的建議內容 suggest from user -->
                                <div class="col-xs-12 col-md-10 col-md-offset-1 form-group data">
                                    <div class="RoundBtn-1-5 text-medium-1">建議內容</div><p>
                                    <textarea name="suggest" id="suggest" class="form-control text-medium-3" rows="5" style="text-align:left"></textarea>
                                </div>

                                <!-- 使用者的電子信箱 user's email -->
                                <div class="col-xs-12 col-md-10 col-md-offset-1 form-group data">
                                    <div class="RoundBtn-1-5 text-medium-1">電子信箱</div><p>
                                    <input type="email" name="email" id="email" class="form-control text-medium-3">
                                </div>
                            </form>
                        </div>

                        <!-- 結尾,按鈕區塊 -->
                        <div class="modal-footer">
                            <button type="button" id="suggestSubmit" class="btn-1 text-article-0" data-dismiss="modal">送出</button>
                            <span style="margin: 15px;"></span>
                            <button type="button" class="btn-2 text-article-2" data-dismiss="modal">取消</button>
                        </div>
                    </div>
                </div>
            </div><!-- suggestion Modal 結束 -->

            <!-- small modal 回應彈出視窗 -->
            <div class="modal fade prompt-message" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title text-Large-1" id="myModalLabel">感謝視窗</h4>
                        </div>
                        <div class="modal-body text-medium-3">
                            <div class="form-group cta">
                                <!-- 訊息內容，尚未載入 -->
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn-1 text-article-0" data-dismiss="modal">確認</button>
                        </div>
                    </div>
                </div>
            </div><!-- small modal 結束 -->
