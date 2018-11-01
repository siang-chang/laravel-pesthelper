@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{dd($pestData,$alias,$solutionData)}}
                @foreach ($pestData as $data)
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
                            {{ $data->habit }}
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
                @foreach ($solutionData as $solution)
                {{ $solution->solutionType }}
                {{ $solution->solution }}
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
