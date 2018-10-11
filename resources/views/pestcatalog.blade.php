@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form method="POST" action="pestDetailed">
                @csrf
                    @foreach($sorts as $sort)
                    <div class="form-group"> 
                        <table>
                            <tr>
                                <td>
                                    {{ $orderNum=$sort->orderNum }}
                                </td>
                            </tr>
                        </table>
                    </div>
                    @endforeach
                    @foreach($datas as $data)
                    {{ $data->pestNum }}
                        <div class="col-md-2"><a href="pestDetailed/{{ $data->pestNum }}" class="btn btn-primary">123</a></div>
                    @endforeach
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
