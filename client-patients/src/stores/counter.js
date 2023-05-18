import { defineStore } from 'pinia'
import axios from 'axios'
import Swal from 'sweetalert2'

export const usePatientsStore = defineStore('counter', {
  state: () => ({
    patients: [],
    patient: {}
  }),
  getters: {
    // doubleCount: (state) => state.count * 2,
  },
  actions: {
    async getAll () {
      try {
        const { data } = await axios({
          method: 'get',
          url: 'http://localhost:8080/api/patients'
        })
        this.patients = data.result
      } catch (error) {
        console.log(error);
      } 
    },
    async getOne(id) {
      try {
        const { data } = await axios({
          method: 'get',
          url: `http://localhost:8080/api/patients/${id}`
        })
        this.patient = data.result
      } catch (error) {
        console.log(error);
      }
    },
    async postPatient(patientForm) {
      try {
        const { data } = await axios({
          method: 'post',
          url: 'http://localhost:8080/api/patients',
          data: patientForm
        })
        Swal.fire({
          position: 'top-end',
          icon: 'success',
          toast: true,
          title: `${data.status.message}`,
          showConfirmButton: false,
          timer: 1500
        })
        this.router.push('/')
      } catch (error) {
        Swal.fire({
          position: 'top-end',
          icon: 'info',
          toast: true,
          title: `${error.response.data.status.messages[0]}`,
          showConfirmButton: false,
          timer: 2000
        })
        console.log(error);
      }
    },
    async deletePatient(id) {
      try {
        const { data } = await axios({
          method: 'delete',
          url: `http://localhost:8080/api/patients/${id}`
        })
        Swal.fire({
          position: 'top-end',
          icon: 'success',
          toast: true,
          title: `${data.status.message}`,
          showConfirmButton: false,
          timer: 1500
        })
        await this.getAll()
      } catch (error) {
        console.log(error);
      }
    },
    async putPatient(patient) {
      try {
        const { data } = await axios({
          method: 'put',
          url: `http://localhost:8080/api/patients/${patient.id}`,
          data: patient.patientForm
        })
        Swal.fire({
          position: 'top-end',
          icon: 'success',
          toast: true,
          title: `${data.status.message}`,
          showConfirmButton: false,
          timer: 1500
        })
        this.router.push('/')
      } catch (error) {
        Swal.fire({
          position: 'top-end',
          icon: 'info',
          toast: true,
          title: `${error.response.data.status.messages[0]}`,
          showConfirmButton: false,
          timer: 2000
        })
        console.log(error);
      }
    },
  },
})