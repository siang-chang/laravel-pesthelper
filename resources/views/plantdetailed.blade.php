@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @foreach ($Data[0] as $data)
                <table>
                    <tr>
                        <td>
                            {{ $data->num }}
                        </td>
                        <td>
                            {{ $data->name }}
                        </td>
                        <td>
                            {{ $data->scientificName }}
                        </td>
                        <td>
                            {{ $data->alias }}
                        </td>
                        <td>
                            {{ $data->plantFamily }}
                        </td>
                        <td>
                            {{ $data->plantGenus }}
                        </td>
                        <td>
                            {{ $data->img }}
                        </td>
                    </tr>
                </table>
                @endforeach
                @foreach ($Data[1] as $relationship)
                {{ $relationship->pestNum }}
                {{ $relationship->name }}
                {{ $relationship->img }}
                <br>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
