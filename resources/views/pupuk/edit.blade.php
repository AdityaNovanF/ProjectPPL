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

                <form role="form" method='post' action='{{url('pupuk/'.$dt->id)}}'>
                    @csrf
                    {{ method_field('put') }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pupuk/Obat</label>
                            <input type="text" name='nama' class="form-control" id="exampleInputEmail1" placeholder="Nama pupuk" value="{{$dt->nama}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Berat (Kg)</label>
                            <input type="number" name='berat' class="form-control" id="exampleInputPassword1" placeholder="Berat" value="{{$dt->berat}}">
                        </div>
                        <div class=" form-group">
                            <label for="exampleInputPassword1">Manfaat</label>
                            <textarea class='form-control' name="manfaat" rows="5">{{$dt->manfaat}}</textarea>
                        </div>
                    </div>
                    <!-- /.box-body -->

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