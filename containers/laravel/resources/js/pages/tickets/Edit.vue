<template>
  <AppLayout :breadcrumbs="breadcrumbItems">
    <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
      <h1>Tickets</h1>
      <TicketForm :project="project" :ticket="ticket" :members="members" :formProps="update.form({project_id: project.id, ticket_id: ticket.id})" />
    </div>
  </AppLayout>
</template>

<script setup lang="ts">
import TicketForm from './TicketForm.vue';
import type { Project, Ticket, Member } from '@/types';
import { update } from '@/routes/tickets';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';

const breadcrumbItems: BreadcrumbItem[] = [
  {
    title: 'Tickets',
    href: '/tickets',
  },
];

const props = defineProps<{
  project: Project;
  ticket: Ticket;
  members: Member[];
}>();
</script>