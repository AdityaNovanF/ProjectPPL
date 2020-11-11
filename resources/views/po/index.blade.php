@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    <a href='{{ url('po/add') }}' class="btn btn-sm btn-flat btn-primary"><i class="fa fa-plus"></i> Add Pre Orders</a>
                </p>
            </div>
            <div class="box-body">

                <div class='table-responsive'>
                    <table class='table table-hover myTable'>
                        <thead>
                            <tr>
                                <th>action</th>
                                <th>No.</th>
                                <th>Pupuk</th>
                                <th>Nama</th>
                                <th>Kode</th>
                                <th>Jumlah</th>
                                <th>Harga Satuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $e=>$dt)
                            <tr>
                                <td>
                                    <div style="width:80px">
                                        <a href='{{url('po/'.$dt->id)}}' class="btn btn-warning btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a>
                                        <button href='{{url('po/'.$dt->id)}}' class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button>
                                    </div>
                                </td>
                                <td>{{ $e+1 }}</td>
                                <td>{{ $dt->pupuk_r->nama }}</td>
                                <td>{{ $dt->nama }}</td>
                                <td>{{ $dt->kode }}</td>
                                <td>{{ $dt->jumlah }}</td>
                                <td>{{ $dt->pupuk_r->harga }}</td>
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

@section('scripts')

<script type="text/javascript">
    $(document).ready(function() {

        // btn refresh
        $('.btn-refresh').click(function(e) {
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })

    })
</script>

@endsection