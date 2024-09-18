@extends('layouts.app');
@section('title', 'Lista de Propiedades')
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
@endpush

@section('content')
    <div>
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <div class="page-pretitle">Overview</div>
                        <h2 class="page-title">Cargar Archivo</h2>
                    </div>

                </div>
            </div>
        </div>
        <div class="page-body ">

            <div class="container-fluid fade show text-center">
                <div class="row">
                    <form action="{{ route('pdf.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="folio" value="{{ $property->folio }}">
                        <div class="mb-3">
                            <label for="pdf" class="form-label">Cargar PDF</label>
                            <input type="file" name="pdf" class="form-control" id="pdf" accept=".pdf"
                                required>
                        </div>
                        <button type="submit" class="btn btn-dark mt-3">Cargar</button>
                    </form>
                    <div class="row">
                        @isset($property->pdf)
                            <div class="col-12 mt-3">
                                <object data="{{ asset('storage/uploads/' . $property->pdf) }}" type="application/pdf"
                                    width="100%" height="600px">
                                    <p>Este navegador no soporta PDFs. Por favor, descarga el PDF para verlo: <a
                                            href="{{ asset('storage/uploads/' . $property->pdf) }}">Ver PDF</a>.</p>
                                </object>
                            </div>
                        @endisset
                    </div>

                </div>
            </div>
        </div>
    </div>
    <Toasts ref="toasts"></Toasts>
@endsection
@push('scripts2')
    <script>
        $(document).ready(function() {
            $('.toggle-details').click(function() {
                var detailsContainer = $(this).closest('tr').find('.details-container');
                detailsContainer.slideToggle();
            });
        });
    </script>
@endpush
