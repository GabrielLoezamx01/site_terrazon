<div class="row">
    @foreach ($cards as $index => $card)
    <div class="results-items col-12 col-sm-6 col-lg-4 d-flex justify-content-center mb-4">
        <x-card :card="$card" />
    </div>
    @endforeach
</div>
<div class="row pt-3 px-3">
    <nav aria-label="Page navigation example">
        <ul class="pagination  justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i class="bi bi-arrow-left"></i></a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#"><i class="bi bi-arrow-right"></i></a>
            </li>
        </ul>
    </nav>
</div>