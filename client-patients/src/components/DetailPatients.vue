<script>
import { RouterLink } from 'vue-router'
import { mapActions, mapState } from 'pinia'
import { usePatientsStore } from '../stores/counter'
export default {
    created() {
        this.getOne(this.$route.params.id)
    },
    computed: {
        ...mapState(usePatientsStore, ['patient'])
    },
    methods: {
        ...mapActions(usePatientsStore, ['getOne']),
    }
}
</script>

<template>
    <div class="hero min-h-screen">
        <div class="hero-content">
            <div class="w-screen flex flex-col items-center gap-2">
                <div class="avatar">
                    <div class="w-24 rounded-full">
                        <img
                            src="https://images.unsplash.com/photo-1511367461989-f85a21fda167?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2231&q=80" />
                    </div>
                </div>
                <div class="flex items-center gap-10">
                    <h1 class="text-3xl font-bold">Patient Detail</h1>
                    <RouterLink to="/" class="btn btn-primary pad">Back</RouterLink>
                </div>
                <table class="mt-5 table w-5/12 shadow-xl">
                    <tbody>
                        <tr>
                            <td class="text-sky-600">Name</td>
                            <td>{{ patient.name }}</td>
                        </tr>
                        <tr>
                            <td class="text-sky-600">NIK</td>
                            <td>{{ patient.nik }}</td>
                        </tr>
                        <tr>
                            <td class="text-sky-600">Sex</td>
                            <td>{{ patient.sex }}</td>
                        </tr>
                        <tr>
                            <td class="text-sky-600">Religion</td>
                            <td>{{ patient.religion }}</td>
                        </tr>
                        <tr>
                            <td class="text-sky-600">Phone</td>
                            <td>{{ patient.phone }}</td>
                        </tr>
                        <tr>
                            <td class="text-sky-600">Address</td>
                            <td>{{ patient.address }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<style scoped></style>