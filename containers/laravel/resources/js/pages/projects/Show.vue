<template>
  <AppLayout :breadcrumbs="breadcrumbItems">
    <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
      <h1>Projects</h1>
    </div>
  </AppLayout>
</template>

<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { type Project } from '@/types';

const breadcrumbItems: BreadcrumbItem[] = [
  {
    title: 'Projects',
    href: '/projects',
  },
];

const props = defineProps<{
  project: Project;
}>();

</script>
