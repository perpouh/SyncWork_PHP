<template>
  <div>
    <h1>{{ ticket.title }}</h1>
  </div>
</template>

<script setup lang="ts">
import type { Ticket, Project } from '@/types';

defineProps<{
  ticket: Ticket;
  project: Project;
}>();
</script>