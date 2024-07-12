<div v v-if="view7">
    <div class="mb-3">
        <h3 class="fs-2 fw-bold">Detalles de la propiedad</h3>
    </div>
    <div class="row g-5" >
        <div class="mb-3">
            <input type="text" v-model="detail" class="form-control">
            <button class="btn btn-primary mt-5" @click="addDetails" >Agregar</button>
        </div>
        <div class="mb-3">
            <ul>
                <li v-for="(item,index) in selectDetails" class="mt-2">
                    <div class="row">
                        <div class="col">  @{{  item }}</div>
                        <div class="col ">
                   <button class="btn btn-danger btn-sm" @click="removeDetail(index)">Eliminar</button>

                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-md-12 mt-5" v-if="defaulview">
            <button class="btn btn-primary" @click="verifyProperty">Verificar Propiedad</button>
        </div>
    </div>
</div>
