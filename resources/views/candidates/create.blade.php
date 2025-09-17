@extends('dashbase')

@section('content')

    <div class="container">
        <div class="page-header">


            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title mt-5">ajouter un candidat</h3>
                </div>
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('candidates.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row formtype">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nom </label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}"
                                    required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Programme </label>
                                <input type="text" class="form-control @error('programme') is-invalid @enderror"
                                    name="programme" value="{{ old('programme') }}"
                                    required>
                                @error('programme')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Image</label>
                                <input
                                    class="form-control @error('photo')
                                    is-invalid
                                @enderror"
                                type="file"
                                name="photo" id="photo">
                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>poste </label>
                                <select name="poste[]" id="poste" class="form-control @error('poste') is-invalid @enderror" multiple>
                                    @foreach ($postes as $poste)
                                        <option value="{{ $poste->id }}" {{ in_array($poste->id, old('poste', [])) ? 'selected' : '' }}>
                                            {{ $poste->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('poste')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary buttonedit ml-2">ajouter</button>


                </form>
            </div>
        </div>
    </div>

@endsection

