<script>
import { mapActions, mapState } from 'pinia'
import { usePatientsStore } from '../stores/counter'
export default {
    created() {
        this.getAll()
    },
    computed: {
        ...mapState(usePatientsStore, ['patients'])
    },
    methods: {
        ...mapActions(usePatientsStore, ['getAll']),
        toEdit() {
            this.$router.push("/edit/1")
        },
        toDetail(id) {
            this.$router.push(`/detail/${id}`)
        }
    }
}

</script>
    
<template>
    <div class="overflow-x-auto shadow-2xl">
        <table class="table w-full">
            <!-- head -->
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>NIK</th>
                    <th>Sex</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                <tr class="hover" @click="() => toDetail(patient.id)" v-for="(patient, index) in patients" :key="index">
                    <th>{{ index+1 }}</th>
                    <td>{{ patient.name }}</td>
                    <td>{{ patient.nik }}</td>
                    <td>{{ patient.sex }}</td>
                    <td>
                        <div class="action">
                            <button>
                                <i class="fa-solid fa-trash" style="color: #dc2626; width: 20px;"></i>
                            </button>
                            <button @click.stop="toEdit">
                                <i class="fa-solid fa-user-pen" style="color: #0ea5e9; width: 20px;"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<style scoped>
.action {
    display: flex;
    gap: 20px;
}

.add-gropu {
    display: flex;
    gap: 5px;
}
</style>