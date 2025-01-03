@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Page A</div>

                    <div class="card-body">
                        <div>
                            @if (session('result'))
                                <div class="alert alert-success">{{ session('result') }}: {{ session('winAmount') }}</div>
                            @endif
                            @if (session('linkGenerated'))
                                <div class="alert alert-success">{{ session('linkGenerated') }}</div>
                            @endif
                        </div>
                       <div class="d-flex justify-content-between">
                           <div class="d-flex">
                               <div>
                                   <form action="{{ route('link.generateNew', ['token' => $link->token]) }}" method="POST">
                                       @csrf
                                       <button type="submit" class="btn btn-success">Generate Unique Link</button>
                                   </form>
                               </div>
                               <div class="mx-2">
                                   <form action="{{ route('link.deactivate', ['token' => $link->token]) }}" method="POST">
                                       @csrf
                                       <button type="submit" class="btn btn-danger">Deactivate</button>
                                   </form>
                               </div>
                           </div>
                           <div class="d-flex">
                               <div>
                                   <form action="{{ route('lucky.play', ['token' => $link->token]) }}" method="POST">
                                       @csrf
                                       <button type="submit" class="btn btn-primary">I am Lucky</button>
                                   </form>
                               </div>
                               <div class="mx-2">
                                   <a class="btn btn-success" href="{{ route('lucky.history', ['token' => $link->token]) }}">History</a>
                               </div>
                           </div>
                       </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
