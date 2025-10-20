<template>
  <AppLayout :breadcrumbs="breadcrumbItems">
    <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
      <h1>Tickets</h1>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Status</th>
            <th>Priority</th>
            <th>Assignee</th>
            <th>Type</th>
            <th>Created At</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="ticket in tickets" :key="ticket.id">
            <td>{{ ticket.id }}</td>
            <td><Link :href="show({project_id: project.id, ticket_id: ticket.id})">{{ ticket.title }}</Link></td>
            <td>{{ ticket.status }}</td>
            <td>{{ ticket.priority }}</td>
            <td>{{ ticket.assignee }}</td>
            <td>{{ ticket.type }}</td>
            <td>{{ ticket.created_at }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </AppLayout>
</template>

<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { show } from '@/routes/tickets';
import { type Project, type Ticket } from '@/types';
import { computed } from 'vue';

const props = defineProps<{
  project: Project,
  tickets: Ticket[];
}>();

const project = computed(() => props.project);

const breadcrumbItems: BreadcrumbItem[] = [
  { title: project.value.title, href: "projects/" + project.value.id },
];
</script>