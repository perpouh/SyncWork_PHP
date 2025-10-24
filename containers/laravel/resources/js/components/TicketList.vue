<template>
  <div class="ticket-row" v-for="ticket in tickets" :key="ticket.id">
    <div>
      <span class="project-title">{{ ticket.project.title }}</span>
    </div>
    <div>
      <span class="ticket-title">{{ ticket.title }}</span>
      <span class="ticket-status">{{ ticket.status }}</span>
      <span class="ticket-priority">{{ ticket.priority }}</span>
      <span>{{ ticket.type }}</span>
    </div>
  </div>
</template>

<script setup lang="ts">
import { type Ticket } from '@/types';

defineProps<{
  tickets: Ticket[];
}>();
</script>

<style scoped>
.ticket-row {
  display: flex;
  flex-direction: column;
  padding: 8px 16px;
  border-bottom: 1px solid #ddd;
}

.project-title {
  font-size: 0.8rem;
  color: #666;
}

.ticket-title {
  font-size: 1.2rem;
  font-weight: bold;
}

.ticket-status {
  font-size: 0.8rem;
  color: #666;
}

.ticket-priority {
  font-size: 0.8rem;
  color: #666;
}
</style>