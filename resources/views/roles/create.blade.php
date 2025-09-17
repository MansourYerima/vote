@extends('dashbase')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title mt-5">Ajouter role</h3> </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <form action="{{route('roles.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Nom role <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="name"> </div>


                            <strong>Permission:</strong>
                            <br/>
                            @foreach($permission as $value)
                                <label><input type="checkbox" name="permission[{{$value->id}}]" value="{{$value->id}}" class="name">
                                {{ $value->name }}</label>
                                <br/>
                            @endforeach

                        </div>
                    </div>
                    <div class="m-t-20">
                        <button class="btn btn-primary submit-btn">créer Role</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
