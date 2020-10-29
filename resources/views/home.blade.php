@extends('layouts.app')


@section('css')
<style>
    #box_test{
        border: 1px solid #fff;
        padding: 20px;
    }

</style>
@endsection

@section('content')
    
@endsection

@section('script')
<script>
    $('#test_btn').on('click', () => {
        if($('#load_btn').hasClass('loading')){
            $('#load_btn').removeClass('double loading');
        }else{
            $('#load_btn').addClass('double loading');
        }
    });
</script>
@endsection