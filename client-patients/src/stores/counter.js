import { defineStore } from 'pinia'
import axios from 'axios'

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
        console.log(data);
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
        this.router.push('/')
        console.log(data);
      } catch (error) {
        console.log(error);
      }
    },
    async deletePatient(id) {
      try {
        const { data } = await axios({
          method: 'delete',
          url: `http://localhost:8080/api/patients/${id}`
        })
        this.getAll()
        console.log(data);
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
        this.router.push('/')
        console.log(data);
      } catch (error) {
        console.log(error);
      }
    },
  },
})