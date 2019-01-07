@extends('adminlte::page')

@section('content')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="http://localhost/shoping/public/vendor/datatables/buttons.server-side.js"></script>


{!! $dataTable->table() !!}




{!! $dataTable->scripts() !!}


@endsection