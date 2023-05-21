@extends("back.layouts.master")
@section("title","Panel")
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->

    <button id="showAlert">Alert Göster</button>









    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Cedvel <span><a href="{{route('admin.menzil.create')}}"><i
                            class="btn btn-success fa-solid fa-circle-plus"></i></a></span></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <td><select data-column="0" name="kompleks" class="form-control filter-select">
                                    <option value="">Kompleks seçin</option>
                                    @foreach($kompleks as $data)
                                    <option value="{{$data->title}}">{{$data->title}}</option>
                                    @endforeach
                                </select>
                                <hr>
                                <input type="text" class="form-control filter-input" data-column='0'>
                            </td>
                            <td> <select data-column="1" name="bina" class="form-control filter-select">
                                    <option value="">Bina seçin</option>
                                    @foreach($bina as $data)
                                    <option value="{{$data->bina}}">{{$data->bina}}</option>
                                    @endforeach
                                </select>
                                <hr>
                                <input type="text" class="form-control filter-input" data-column='1'>
                            </td>
                            <td><select data-column="2" name="mehsul" class="form-control filter-select">
                                    <option value="">Menzil seçin</option>
                                    @foreach($menzil as $data)
                                    <option value="{{$data->menzil}}">{{$data->menzil}}</option>
                                    @endforeach
                                </select>
                                <hr>
                                <input type="text" class="form-control filter-input" data-column='2'>
                            </td>
                            <td>


                            </td>
                        </tr>
                        <tr>
                            <th>Kompleks</th>
                            <th>Bina</th>
                            <th>Menzil</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($menzil as $item)
                        <tr>
                            <th>{{$item->getKompleks->title}}</th>
                            <th>{{$item->getBina->bina}}</th>
                            <th>{{$item->menzil}}</th>
                            <th> <a href="{{route('admin.menzil.edit',$item->id)}}"><i
                                        class="btn btn-info fa-solid fa-pen-to-square"></i></a>
                                <a href="{{route('admin.delete.menzil',$item->id)}}"><i
                                        class="btn btn-danger fa-solid fa-trash"></i></a>

                            </th>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- Sweet Alert -->
@if(Session::has('message'))
<script>
swal('Message', "{{Session::get('message')}}", 'success', {
    button: true,
    button: 'OK',
    timer: 6000,
    dangerMode: true,
});
</script>
@endif









@endsection

@section('javascript')


<script>
$(document).ready(function() {
    $('#showAlert').click(function() {
        alert('Merhaba! Bu bir jQuery Alert mesajıdır.');
    });
});
</script>


<script>
$(document).ready(function() {
    var table = $("#dataTable").DataTable({
        'processing': true,
        'serverSide': true,
        columns: [{
                data: "kompleks"
            },
            {
                data: "bina"
            },
            {
                data: "menzil"
            }
        ],
    });
    $('.filter-input').keyup(function() {
        table.column($(this).data('column'))
            .search($(this).val())
            .draw();
    });


    $('.filter-select').change(function() {
        table.column($(this).data('column'))
            .search($(this).val())
            .draw();
    });
});
</script>


@endsection