<template>
  <Bar :chart-data="chartData" />
</template>

<script>
import { Bar } from 'vue-chartjs'
import {
  Chart as ChartJS,
  Title,
  Tooltip,
  Legend,
  BarElement,
  CategoryScale,
  LinearScale,
} from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

export default {
  name: 'BarChart',
  components: {
    Bar,
  },
  props: {
    chartId: {
      type: String,
      default: 'bar-chart',
    },
    width: {
      type: Number,
      default: 400,
    },
    height: {
      type: Number,
      default: 600,
    },
    cssClasses: {
      default: '',
      type: String,
    },
  },
  data() {
    return {
      chartData: null,
      chartOptions: null,
    }
  },
  beforeMount() {
    this.chartData = {
      labels: ['0-20', '20-30', '30-40', '50-60', '60-70', '+70'],
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
          data: [40, 20, 12, 15, 50, 5],
        },
      ],
    }
  },
}
</script>
