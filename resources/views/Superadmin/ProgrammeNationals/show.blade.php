@extends('layouts.superadmin')
@section('content')
<div class="card mt-5">
    <div class="card-header">
        <h4 class="text-left mb-1"> Programme-{{ $programmenational->classe->name }} </h4>
    </div>
    <div class="card-body ">
        <div class="container-fluid">
            <table class="table table-bordered table-hover table-striped table-sm">
                <thead class="">
                    <th> Matière </th>
                    <th> Coefficient </th>
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
@endsection
