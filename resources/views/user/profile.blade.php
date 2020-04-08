@extends('layouts.app')
<style type="text/css">
    .profile-img {
        max-width: 150px;
        border: 5px solid #ffffff;
        border-radius: 100%;
        box-shadow: 0 2px 2px rgba(0, 0, 0, 0.3);
    }
</style>
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body text-center">
                    <img class="profile-img"
                         src="https://cdn.pixabay.com/photo/2013/07/13/10/07/man-156584_960_720.png">
                    <h1>{{ $user->name }}</h1>
                    <h5>{{ $user->email }}</h5>
                    <h5>{{ $user->dob->format('l j F Y') }}
                        ({{$user->dob->age}}
                        Years old)</h5>
                    <button class="btn btn-success">Follow</button>
                </div>
            </div>
        </div>
    </div>
@endsection
