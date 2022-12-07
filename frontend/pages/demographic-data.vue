<template>
  <v-row justify="center" align="center">
    <v-col cols="12" style="padding: 0">
      <v-btn class="button-back" icon to="/"><v-icon>mdi-close</v-icon></v-btn>
    </v-col>
    <v-row style="padding-top: 10px !important">
      <CardData
        v-if="passengers"
        description="Passagers"
        :number="passengers.total"
        color="#7ca2e3"
      />
      <CardData
        v-if="result"
        description="(female/male)"
        :number="result.female + '/' + result.male"
        color="#e98985"
      />
      <CardData
        v-if="survivors"
        description="Survivors"
        :number="survivors.total"
        color="#fed898"
      />
      <CardData
        v-if="survivorsClass"
        description="Survivors by class"
        :number="
          survivorsClass.first +
          '/' +
          survivorsClass.second +
          '/' +
          survivorsClass.third
        "
        color="#abd5d6"
      />
      <v-col cols="12" sm="6" style="padding: 20px">
        <v-card class="m-2 p-2" style="height: 300px">
          <PieChart v-if="chartData" :chart-data="chartData" />
        </v-card>
      </v-col>
      <v-col cols="12" sm="6" style="padding: 20px">
        <v-card class="m-2 p-2" style="height: 300px">
          <BarChart v-if="chartDataBar" :chart-data="chartDataBar" />
        </v-card>
      </v-col>
    </v-row>
  </v-row>
</template>

<script>
import CardData from '../components/CardData.vue'
import PieChart from '../components/PieChart.vue'
import BarChart from '../components/BarChart.vue'
export default {
  name: 'IndexPage',
  components: { CardData, PieChart, BarChart },
  data() {
    return {
      result: null,
      chartData: null,
      chartDataBar: null,
      passengers: null,
      survivors: null,
      survivorsGender: null,
      survivorsClass: null,
    }
  },
  beforeMount() {
    this.fetchGenderData()
    this.fetchPassengers()
    this.fetchSurvivors()
    this.fetchSurvivorsByGender()
    this.fetchSurvivorsByClass()
  },
  methods: {
    async fetchGenderData() {
      this.result = await this.$axios
        .get('http://127.0.0.1:8000/gender-data', {})
        .then((response) => {
          this.chartData = {
            labels: ['Male', 'Female'],
            datasets: [
              {
                backgroundColor: ['#7ca2e3', '#e98985'],
                data: [response.data.male, response.data.female],
              },
            ],
          }
          return response.data
        })
    },
    async fetchPassengers() {
      this.passengers = await this.$axios
        .get('http://127.0.0.1:8000/passengers', {})
        .then((response) => {
          return response.data
        })
    },

    async fetchSurvivors() {
      this.survivors = await this.$axios
        .get('http://127.0.0.1:8000/survivors', {})
        .then((response) => {
          return response.data
        })
    },

    async fetchSurvivorsByGender() {
      this.survivorsGender = await this.$axios
        .get('http://127.0.0.1:8000/survivors-gender', {})
        .then((response) => {
          this.chartDataBar = {
            labels: ['Male', 'Female'],
            datasets: [
              {
                label: 'Passenger age distribution',
                backgroundColor: [
                  '#7ca2e3',
                  '#e98985',
                  '#fed898',
                  '#abd5d6',
                  '#7ca2e3',
                  '#fed898',
                ],
                data: [response.data.data[0], response.data.data[1]],
              },
            ],
          }
          return response.data
        })
    },

    async fetchSurvivorsByClass() {
      this.survivorsClass = await this.$axios
        .get('http://127.0.0.1:8000/survivors-class', {})
        .then((response) => {
          return response.data
        })
    },
  },
}
</script>
