<template>
  <AppLayout :breadcrumbs="breadcrumbItems">
    <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4 ticket">
      <h1>{{ ticket.title }}</h1>
      <MarkupArea :markdown="ticket.description" />
      <div>
        <span>{{ ticket.status }}</span>
        <span>{{ ticket.priority }}</span>
        <span>{{ ticket.assignee?.name || '未割り当て' }}</span>
        <span>{{ ticket.type }}</span>
        <span>{{ ticket.created_at }}</span>
        <span>{{ ticket.updated_at }}</span>
      </div>
    </div>
  </AppLayout>
</template>

<script setup lang="ts">
import type { Ticket, Project } from '@/types';
import { computed } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import MarkupArea from './MarkupArea.vue';

const props = defineProps<{
  project: Project,
  ticket: Ticket;
}>();

const project = computed(() => props.project);

const breadcrumbItems: BreadcrumbItem[] = [
  { title: project.value.title, href: "projects/" + project.value.id },
];

</script>

<style>
.ticket {
  border: 1px solid #ccc;
  margin: 16px;
}
h1 {
  font-size: 1.6rem;
  font-weight: bold;
}
</style>
