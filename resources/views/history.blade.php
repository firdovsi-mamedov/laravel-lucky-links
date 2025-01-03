@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">History</div>

                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Random Number</th>
                                <th>Result</th>
                                <th>Win Amount</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($luckyResults as $result)
                                <tr>
                                    <td>{{ $result->id }}</td>
                                    <td>{{ $result->random_number }}</td>
                                    <td>{{ $result->result }}</td>
                                    <td>{{ $result->win_amount }}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
