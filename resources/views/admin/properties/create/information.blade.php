<div v-if="view1">
    <div v-for="(field,index) in fields" class="mb-3">
        <div v-if="field.type === 'label'">
            <h3 class="fs-2 fw-bold">@{{ field.label }}</h3>
        </div>
        <div v-if="field.type === 'text'">
            <label class="form-label required">@{{ field.label }}</label>
            <input type="text" v-model="field.value"
                :class="{ 'form-control': true, 'is-invalid': isFieldEmpty(field.value) && submitted }">
        </div>
        <div v-if="field.type === 'checkbox'">
            <label class="row">
                <label class="col form-label ">@{{ field.label }}</label>
                <span class="col-auto">
                    <label class="form-check form-check-single form-switch">
                        <input class="form-check-input" v-model="checkbox" type="checkbox">
                    </label>
                </span>
            </label>
            <div class="mb-3" v-if="view_checbox == true">
                <label class="form-label required">Cantidad</label>
                <input type="number" :class="{ 'form-control': true, 'is-invalid': error_input }"v-model="parking"
                    placeholder="Numero de autos">
            </div>
        </div>
        <div v-if="field.type === 'number'">
            <label class="form-label required">@{{ field.label }}</label>
            <input type="number" v-model="field.value"
                :class="{ 'form-control': true, 'is-invalid': isFieldEmpty(field.value) && submitted }">
        </div>
        <div v-if="field.type === 'textarea'">
            <label class="form-label required">@{{ field.label }}</label>
            <textarea id="" cols="30" rows="10" v-model="field.value"
                :class="{ 'form-control': true, 'is-invalid': isFieldEmpty(field.value) && submitted }"></textarea>
        </div>
    </div>
    <button v-if="defaulview" class="btn btn-primary" @click="validacionRequest">Siguiente</button>
</div>
