@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @foreach($Data[0] as $sort)
                <div class="form-group">
                    <table>
                        <tr>
                            <td>
                                {{ $sort->categoryNum }}
                                {{ $sort->categoryName }}
                            </td>
                            <td>
                                <input type="text" name="searchType" value={{ $sort->categoryNum }} hidden>
                                <button type="submit">更多</button>
                            </td>
                        </tr>
                    </table>
                </div>
                @endforeach
                @csrf
                @foreach($Data[1] as $data)
                <div class="form-group">
                    <table>
                        <tr>
                            <td>
                                <div class="col-md-2"><a href="plantDetailed/{{ $data->name }}" class="btn btn-primary">{{
                                        $data->num }}</a></div>
                            </td>
                        </tr>
                    </table>
                </div>
                @endforeach
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
