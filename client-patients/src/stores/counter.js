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
        this.patient = data.result
      } catch (error) {
        console.log(error);
      }
    }
  },
})