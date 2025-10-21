<template>
  <AppLayout :breadcrumbs="breadcrumbItems">
    <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
      <h1>Tickets</h1>
      <TicketForm :project="project" :ticket="ticket" :members="members" :formProps="store.form(project.id)" />
    </div>
  </AppLayout>
</template>

<script setup lang="ts">
import TicketForm from './TicketForm.vue';
import type { Project, Ticket, Member } from '@/types';
import { store } from '@/routes/tickets';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { ref } from 'vue';
const breadcrumbItems: BreadcrumbItem[] = [
  {
    title: 'Tickets',
    href: '/tickets',
  },
];

defineProps<{
  project: Project;
  ticket: Ticket;
  members: Member[];
}>();

</script>
