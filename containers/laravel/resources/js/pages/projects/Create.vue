<template>
  <AppLayout :breadcrumbs="breadcrumbItems">
    <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
      <h1>Projects</h1>
      <ProjectForm
        :title="formData.title"
        :description="formData.description"
        submit-text="Create Project"
        :members="[]"
        :form-props="store.form()"
        @update:title="formData.title = $event"
        @update:description="formData.description = $event"
      />
    </div>
  </AppLayout>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import HeadingSmall from '@/components/HeadingSmall.vue';
import ProjectForm from './ProjectForm.vue';
import { store } from '@/routes/projects';

const breadcrumbItems: BreadcrumbItem[] = [
  {
    title: 'Projects',
    href: '/projects',
  },
];

const formData = ref({
  title: '',
  description: '',
});
</script>
