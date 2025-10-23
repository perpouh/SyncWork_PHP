<template>

</template>

<script setup lang="ts">
import { ref } from 'vue';


const props = defineProps<{
  email: string;
}>();

const inputEmail = ref(props.email);
</script>
