<script>
import TablePatients from '../components/TablePatients.vue'
import { mapActions, mapState } from 'pinia'
import { usePatientsStore } from '../stores/counter'
export default {
    components: {
        TablePatients,
    }
}
</script>

<template>
    <TablePatients />
</template>

<style></style>