@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{dd($plantData,$alias,$infectRelation)}}
                @foreach ($plantData as $data)
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
                            {{ $data->category }}
                        </td>
                        <td>
                            {{ $data->secondCategory }}
                        </td>
                        <td>
                            {{ $data->img }}
                        </td>
                    </tr>
                </table>
                @endforeach
                @foreach ($alias as $_alias)
                {{ $_alias }}
                <br>
                @endforeach
                @foreach ($infectRelation as $relationship)
                {{ $relationship->num }}
                {{ $relationship->name }}
                {{ $relationship->img }}
                <br>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
