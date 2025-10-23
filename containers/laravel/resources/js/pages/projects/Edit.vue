<template>
  <AppLayout :breadcrumbs="breadcrumbItems">
    <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
      <h1>Projects</h1>
      <ProjectForm
        :title="formData.title"
        :description="formData.description"
        submit-text="Update Project"
        :members="formData.members"
        :form-props="update.form(props.project.id)"
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
import { type Project } from '@/types';
import ProjectForm from './ProjectForm.vue';
import { update } from '@/routes/projects';

const breadcrumbItems: BreadcrumbItem[] = [
  {
    title: 'Projects',
    href: '/projects',
  },
];

const props = defineProps<{
  project: Project;
}>();

const formData = ref({
  title: props.project.title,
  description: props.project.description,
  members: props.project.members,
});
</script>
