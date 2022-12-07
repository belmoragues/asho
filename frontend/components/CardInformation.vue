<template>
  <v-card style="width: 30%" :color="color" hover :to="route">
    <v-icon
      size="100"
      style="display: flex; justify-content: center"
      color="white"
    >
      {{ icon }}
    </v-icon>
    <div style="display: flex; justify-content: center; color: white">
      {{ description }}
    </div>
  </v-card>
</template>

<script>
export default {
  props: {
    description: {
      required: true,
      default: '',
      type: String,
    },
    icon: {
      required: true,
      default: '',
      type: String,
    },
    color: {
      required: true,
      default: '',
      type: String,
    },
    route: {
      required: false,
      default: '',
      type: String,
    },
  },
}
</script>
