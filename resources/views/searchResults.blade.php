@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">


                    <form method="POST" action="search">
                        @csrf
                        <div class="form-group row">
                            <input type="text" name="keyword" value="{{ $keyWord }}">
                            <label>類別:</label>
                            <select class="form-group" name="searchType">
                                <option value="area">全部</option>
                                <option value="pest">害蟲</option>
                                <option value="plant">植株</option>
                            </select>
                            <button type="submit">搜尋</button>
                        </div>
                    </form>


                    <form method="POST" action="search">
                        @csrf
                        <input type="text" name="keyword" value="{{ $keyWord }}" hidden>
                        <input type="text" name="searchType" value="area" hidden>
                        <button type="submit">全部</button>
                    </form>

                    <form method="POST" action="search">
                        @csrf
                        <input type="text" name="keyword" value="{{ $keyWord }}" hidden>
                        <input type="text" name="searchType" value="pest" hidden>
                        <button type="submit">害蟲</button>
                    </form>

                    <form method="POST" action="search">
                        @csrf
                        <input type="text" name="keyword" value="{{ $keyWord }}" hidden>
                        <input type="text" name="searchType" value="plant" hidden>
                        <button type="submit">植株</button>
                    </form>


                    <table>
                        @foreach($datas as $data)
                        <tr>
                            <td>{{ $data->num }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->scientificName }}</td>
                            <td>{{ $data->img }}</td>
                        </tr>
                        @endforeach

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
