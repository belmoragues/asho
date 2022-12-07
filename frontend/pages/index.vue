<template>
  <v-row justify="center" align="center">
    <v-col cols="12" style="padding: 0">
      <img src="../static/titanic.png" style="height: 350px; width: 100%" />
      <div class="centered"></div>
    </v-col>
    <v-row style="padding-top: 30px !important">
      <v-col cols="12" style="display: flex; justify-content: center">
        <CardInformation
          description="See graphs"
          icon="mdi-chart-box-outline"
          color="#7ca2e3"
          route="/demographic-data"
        />
      </v-col>
    </v-row>
  </v-row>
</template>

<script>
import CardInformation from '../components/CardInformation.vue'
export default {
  name: 'IndexPage',
  components: { CardInformation },
}
</script>
