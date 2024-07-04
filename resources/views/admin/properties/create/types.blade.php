<div v v-if="view4">
    <div class="mb-3">
        <h3 class="fs-2 fw-bold">Tipos</h3>
    </div>
    <div class="row">
        <div v-for="(chunk, chunkIndex) in chunkedTypes" :key="chunkIndex" class="col-md-3">
            <div v-for="(item, index) in chunk" :key="index" class="form-check form-switch">
                <input class="form-check-input" type="checkbox" @change="toggleTypes(item.id)"
                    :checked="selectedTypes.includes(item.id)" />
                <span class="form-check-label">@{{ item.name }}</span>
            </div>
        </div>
        <div class="col-md-12 mt-5" v-if="defaulview">

            <button class="btn btn-primary" @click="addTypes">Continuar</button>
        </div>
    </div>
</div>
