@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form method="POST" action="newsuggestion">
                    @csrf


                    <div>
                        <table>
                            <tr>
                                <td>
                                    名稱：<input type="text" name="name" value="{{ $name }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    建議：<input type="text" name="suggest">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    信箱：<input type="text" name="email">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="submit" id="btnTest" class="btn-1 text-medium-0">送出</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
