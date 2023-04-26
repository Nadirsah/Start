@extends("back.layouts.master")
@section("title","Panel")
@section('content')

          
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Profil</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">

            <form action="{{route('admin.profil.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Ad</label>
                            <input type="text" name='name' value="{{old('name')}}" class="form-control" id="name"
                                aria-describedby="emailHelp" placeholder='Ad'>
                            <span class="text-danger">@error('name'){{'Ad sahəsi boş ola bilməz!'}}@enderror</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="password" class="form-label">Sifre</label>
                            <input type="text" name='password' value="{{old('password')}}" class="form-control"
                                id="password" aria-describedby="emailHelp" placeholder='Sifre'>
                            <span class="text-danger">@error('password'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>

        </div>
    </div>

</div>

@endsection