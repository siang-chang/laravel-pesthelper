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
                        <input type="text" name="keyword" value="{{ $keyWord }}" >
                        <label>類別:</label>
                            <select class="form-group" name="searchType">
                            <option value="all">全部</option>
                            <option value="pest">害蟲</option>
                            <option value="plant">植株</option>
                            </select>
                        <button type="submit">搜尋</button>                        
                        </div>
                    </form>
                    
                    <form method="POST" action="search">
                        @csrf                    
                        <input type="text" name="keyword" value="{{ $keyWord }}" hidden>
                        <input type="text" name="searchType" value="all" hidden>
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
                    @if($searchType!='all')
                        @foreach($datas as $data)
                            <tr>
                                @if($searchType=='pest')
                                    <td>{{ $data->pestNum }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->scientificName }}</td>
                                    <td>{{ $data->orderNum }}</td>
                                    <td>{{ $data->familyNum }}</td>
                                    <td>{{ $data->habit }}</td>
                                    <td>{{ $data->img }}</td>
                                @endif

                                @if($searchType=='plant')
                                    <td>{{ $data->plantNum }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->scientificName }}</td>
                                    <td>{{ $data->familyNum }}</td>
                                    <td>{{ $data->genusNum }}</td>
                                    <td>{{ $data->img }}</td>
                                @endif

                            </tr>
                        @endforeach
                    @else
                        @foreach($datas_pest1 as $data_pest1)
                            <tr>                              
                                <td>{{ $data_pest1->pestNum }}</td>
                                <td>{{ $data_pest1->name }}</td>
                                <td>{{ $data_pest1->scientificName }}</td>
                                <td>{{ $data_pest1->orderNum }}</td>
                                <td>{{ $data_pest1->familyNum }}</td>
                                <td>{{ $data_pest1->habit }}</td>
                                <td>{{ $data_pest1->img }}</td>
                            </tr>
                        @endforeach
                        @foreach($datas_plant1 as $data_plant1)
                            <tr>                               
                                <td>{{ $data_plant1->plantNum }}</td>
                                <td>{{ $data_plant1->name }}</td>
                                <td>{{ $data_plant1->scientificName }}</td>
                                <td>{{ $data_plant1->familyNum }}</td>
                                <td>{{ $data_plant1->genusNum }}</td>
                                <td>{{ $data_plant1->img }}</td>                                
                            </tr>
                        @endforeach
                        @foreach($datas_plant2 as $data_plant2)
                            <tr>                               
                                <td>{{ $data_plant2->plantNum }}</td>
                                <td>{{ $data_plant2->name }}</td>
                                <td>{{ $data_plant2->scientificName }}</td>
                                <td>{{ $data_plant2->familyNum }}</td>
                                <td>{{ $data_plant2->genusNum }}</td>
                                <td>{{ $data_plant2->img }}</td>                                
                            </tr>
                        @endforeach
                        @foreach($datas_pest2 as $data_pest2)
                            <tr>                              
                                <td>{{ $data_pest2->pestNum }}</td>
                                <td>{{ $data_pest2->name }}</td>
                                <td>{{ $data_pest2->scientificName }}</td>
                                <td>{{ $data_pest2->orderNum }}</td>
                                <td>{{ $data_pest2->familyNum }}</td>
                                <td>{{ $data_pest2->habit }}</td>
                                <td>{{ $data_pest2->img }}</td>
                            </tr>
                        @endforeach
                    @endif

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
