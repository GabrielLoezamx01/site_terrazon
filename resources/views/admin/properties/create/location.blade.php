<div v-if="view2">
    <div class="mb-3">
        <h3 class="fs-2 fw-bold">Ubicación</h3>
    </div>
    <div class="mb-3">
        <label class="form-label">Localidad</label>
        <select name="" id="" class="form-control" v-model="municipality">
            @foreach ($municipality as $item)
                <option value="{{ $item->id }}">{{ $item->name }} ,
                    {{ $item->state->name }}
                </option>
            @endforeach
        </select>
    </div>
       <div class="mb-3">
        <label class="form-label">Tipo</label>
        <select name="" id="" class="form-control" v-model="tipo_location">
            @foreach ($location as $value)
                <option value="{{ $value->id }}">{{ $value->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Latitud</label>
        <input type="number" class="form-control" v-model="latitude" placeholder="">
    </div>
    <div class="mb-3">
        <label class="form-label">Longitud</label>
        <input type="number" class="form-control" v-model="longitud" placeholder="">
    </div>
    <div class="mb-3" v-if="defaulview">
        <button class="btn btn-primary" @click="saveProperty">Siguiente</button>
    </div>
</div>
