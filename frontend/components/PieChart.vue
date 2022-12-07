<template>
  <Pie :chart-data="chartData" :chart-options="chartOptions" />
</template>

<script>
import { Pie } from 'vue-chartjs'
import {
  Chart as ChartJS,
  Title,
  Tooltip,
  Legend,
  ArcElement,
  CategoryScale,
} from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, ArcElement, CategoryScale)

export default {
  name: 'PieChart',
  components: {
    Pie,
  },
  props: {
    chartId: {
      type: String,
      default: 'pie-chart',
    },
    width: {
      type: Number,
      default: 400,
    },
    height: {
      type: Number,
      default: 400,
    },
    cssClasses: {
      default: '',
      type: String,
    },
    chartData: {
      type: Object,
    },
  },
  data() {
    return {
      chartOptions: null,
    }
  },
  beforeMount() {
    this.chartOptions = {
      responsive: true,
      maintainAspectRatio: false,
    }
  },
}
</script>
