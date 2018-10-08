@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @foreach($sort as $sort)
                <div class="form-group"> 
                    <table>
                        <tr>
                            <td>
                                {{ $orderNum=$sort->orderNum }}
                                {{ DB::table('pestdata')->where('orderNum',$orderNum)->get() }}
                            </td>
                        </tr>
                    </table>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
