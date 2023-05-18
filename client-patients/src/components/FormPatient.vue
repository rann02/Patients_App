<script>
import { mapActions, mapState } from 'pinia'
import { usePatientsStore } from '../stores/counter'
export default {
    data () {
        return {
            patientForm: {
                name: '',
                nik: '',
                sex: '',
                religion: '',
                phone: '',
                address: ''
            }
        }
    },
    async created() {
        if(this.$route.params.id) {
            await this.getOne(this.$route.params.id)
            this.patientForm = this.patient
        }
    },
    computed: {
        ...mapState(usePatientsStore, ['patient'])
    },
    methods: {
        ...mapActions(usePatientsStore, ['postPatient', 'getOne', 'putPatient']),
        async handleSubmit() {
            await this.postPatient(this.patientForm)
        },
        async handleEdit() {
            await this.putPatient({patientForm:this.patientForm, id: this.$route.params.id})
        }
    }
}
</script>

<template>
    <div class="card flex-shrink-0 w-5/12  shadow-xl bg-base-100">
        <form class="card-body">
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Name</span>
                </label>
                <input name="name" v-model="patientForm.name" type="text" placeholder="Full Name" class="input input-bordered input-info" />
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">NIK</span>
                </label>
                <input name="nik" v-model="patientForm.nik" type="text" placeholder="NIK" class="input input-bordered input-info" />
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Sex</span>
                </label>
                <select v-model="patientForm.sex" name="sex" class="select select-info">
                    <option disabled selected>Select one</option>
                    <option>male</option>
                    <option>female</option>
                </select>
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Religion</span>
                </label>
                <input name="religion" v-model="patientForm.religion" type="text" placeholder="Religion" class="input input-bordered input-info" />
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Phone Number</span>
                </label>
                <input name="phone" v-model="patientForm.phone" type="text" placeholder="Phone number" class="input input-bordered input-info" />
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Address</span>
                </label>
                <textarea name="address" v-model="patientForm.address" class="textarea textarea-info" placeholder="Adsress"></textarea>
            </div>
            <div class="form-control mt-3" v-if="this.$route.name == 'addPatient'">
                <button @click.prevent="handleSubmit" class="btn btn-primary">Add Patient</button>
            </div>
            <div class="form-control mt-3" v-else>
                <button @click.prevent="handleEdit" class="btn btn-primary">Edit Patient</button>
            </div>
        </form>
    </div>
</template>