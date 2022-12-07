<template>
  <v-col cols="6" sm="3" style="display: flex; justify-content: center">
    <v-card style="width: 90%" :color="color">
      <div
        class="number-card"
        style="display: flex; justify-content: center; color: white"
      >
        {{ number }}
      </div>
      <div style="display: flex; justify-content: center; color: white">
        {{ description }}
      </div>
    </v-card>
  </v-col>
</template>

<script>
export default {
  props: {
    description: {
      required: true,
      default: '',
      type: String,
    },
    number: {
      required: true,
      default: '',
      type: String,
    },
    color: {
      required: true,
      default: '',
      type: String,
    },
  },
}
</script>
