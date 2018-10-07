@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @foreach($datas as $data)
                <div class="form-group"> 
                    <table>
                        <tr>
                            <td>{{ $data->pestNum }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->scientificName }}</td>
                            <td>{{ $data->orderNum }}</td>
                            <td>{{ $data->familyNum }}</td>
                            <td>{{ $data->habit }}</td>
                            <td>{{ $data->img }}</td>
                        </tr>
                    </table>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
