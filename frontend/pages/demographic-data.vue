<template>
  <v-row justify="center" align="center">
    <v-col cols="12" style="padding: 0">
      <img src="../static/background.jpeg" style="height: 50px; width: 100%" />
      <v-btn class="button-back" icon to="/"><v-icon>mdi-close</v-icon></v-btn>
    </v-col>
    <v-row style="padding-top: 10px !important">
      <CardData description="Passagers" number="1234" color="#7ca2e3" />
      <CardData
        v-if="result"
        description="(female/male)"
        :number="result.female + '/' + result.male"
        color="#e98985"
      />
      <CardData description="Median age" number="35" color="#fed898" />
      <CardData description="Age limits" number="10-68" color="#abd5d6" />
      <v-col cols="12" sm="6" style="padding: 20px">
        <v-card class="m-2 p-2" style="height: 300px">
          <PieChart v-if="chartData" :chart-data="chartData" />
        </v-card>
      </v-col>
      <v-col cols="12" sm="6" style="padding: 20px">
        <v-card class="m-2 p-2" style="height: 300px"> <BarChart /> </v-card>
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
    }
  },
  beforeMount() {
    this.fetchGenderData()
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
  },
}
</script>
