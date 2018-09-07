@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Account</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($users as $user)
              @if($user->role=="user")
                <tr>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td><a href="{{route('users',['id'=>$user->id])}}" 
                    class="btn btn-primary">
                    @if($user->status=="enable")
                    Disable
                    @else
                    Enable
                    @endif
                </a>
                  </td>
                </tr>
              @endif
            @endforeach
            
        </tbody>
    </table>
</div>
@endsection
