@extends('layouts.superadmin')


@section('title')
Superadmin | Programme {{$programmenational->classe->name}}
@endsection

@section('content')
<div class="container mt-4 col-md-10">
    <div class="card">
        <div class="card-header">
            <h2> <span class="badge badge-info">{{ $programmenational->classe->name }}</span> </h2>
        </div>
        <div class="card-body ">
            <div class="container-fluid">
                <table class="table table-sm table-bordered table-striped table-sm">
                    <thead class="">
                        <th> MATIERE </th>
                        <th> COEFFICIENT </th>
                    </thead>
                    <tbody>
                    @foreach ($programmenational->ligneprogrammenationals as $programmenational_ligne)
                        <tr>
                            <td> {{$programmenational_ligne->matiere->name}} </td>
                            <td> {{$programmenational_ligne->coefficient}} </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
