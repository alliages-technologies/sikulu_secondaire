@extends('layouts.superadmin')


@section('title')
Superadmin | Programme {{$programmenational->classe->name}}
@endsection

@section('content')

<div class="container mt-4 col-md-8">
    <div class="card">
        <div class="card-header">
            <h2> PROGRAMME NATIONAL | {{ $programmenational->classe->name }} </h2>
        </div>
        <div class="card-body ">
            <div class="container-fluid">
                <table class="table table-bordered table-striped table-sm">
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
