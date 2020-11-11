@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                </p>
            </div>

            <div class="box-body">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form role="form" accept='{{url('po/'.$dt->id)}}' method='post'>
                    @csrf
                    {{method_field('put')}}

                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pilih pupuk</label>
                            <select name="pupuk" class='form-control select2'>
                                @foreach($pupuk as $sp)
                                <option value="{{ $sp->id }}" {{ ($dt->pupuk == $sp->id)?'selected' : '' }}>{{$sp->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" name='nama' class="form-control" id="exampleInputEmail1" placeholder="Nama" value='{{$dt->nama}}'>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Kode</label>
                            <input type="text" name='kode' value='{{$dt->kode}}' class="form-control" id="exampleInputPassword1" placeholder="Kode Pre Orders">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jumlah</label>
                            <input type="number" name='jumlah' class="form-control" id="exampleInputEmail1" placeholder="jumlah" value='{{$dt->jumlah}}'>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                </form>

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