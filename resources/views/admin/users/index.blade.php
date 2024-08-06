@extends('layouts.app')
@section('title', 'Usuarios')
@section('content')

    <div class="containe-fluid">
            {{ $columns }}
      {{-- <x-table-terrazon :data="$data" :columns="$columns" /> --}}
    </div>
@endsection

@push('scripts2')
<script>
</script>
@endpush
