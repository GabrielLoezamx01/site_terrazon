<div class="modal modal-blur fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">{{ $modal['title_modal'] }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @foreach ($modal['form'] as $key => $item)
                {{ $item }}
                    <form action="">
                        {{-- @foreach($item->fields as $key => $field)
                        <label for="">{{ $field['type'] }}</label>
                        @endforeach --}}
                    </form>
                @endforeach
            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button> --}}
                {{-- <label for="">Se le enviara un email para su confirmacion</label> --}}
            </div>
        </div>
    </div>
</div>
