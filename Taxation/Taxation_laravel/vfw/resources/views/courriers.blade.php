@extends('layouts.main')
@extends('layouts.navbar')
@section('content')
<table class="table table-bordered" id="table-courrier">
    <thead>
        <tr>
            <td>Numero</td>
            <td>Courrier id</td>
            <td>date</td>
        </tr>
    </thead>
    <tbody>
        @foreach($courriers as $courrier)
        <tr>
            <td>{{ $courrier->Numero }}</td>
            <td>{{ $courrier->courrier_id }}</td>
            <td>{{ $courrier->date }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection