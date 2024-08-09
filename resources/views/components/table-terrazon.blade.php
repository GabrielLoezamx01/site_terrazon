<div class="row">
    <div id="table-default" class="table-responsive">
        <table class="table card-table table-vcenter text-nowrap datatable display" id="myTable">
            <thead>
                <tr>
                    @foreach ($columns as $key => $label)
                        <th class="text-start">{{ $label }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($data as $row)
                <tr>
                    a
                </tr>
            @endforeach --}}
            </tbody>
        </table>
    </div>

</div>
