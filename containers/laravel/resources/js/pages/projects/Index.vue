<template>
  <AppLayout :breadcrumbs="breadcrumbItems">
    <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
      <h1>Projects</h1>
      <SearchForm :SearchWord="SearchWord" :IncludeArchived="IncludeArchived" />
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="project in projects" :key="project.id">
            <td>{{ project.id }}</td>
            <td>{{ project.title }}</td>
            <td>{{ project.description }}</td>
            <td>
              <Link :href="edit(project.id)">Edit</Link>
              <Link :href="destroy(project.id)">Delete</Link>
            </td>
          </tr>
        </tbody>
      </table>
      <Link :href="create()">Create</Link>
    </div>
  </AppLayout>
</template>
<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type Project, type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { edit, destroy, create } from '@/routes/projects';
import { ref } from 'vue';
import SearchForm from './SearchForm.vue';

const breadcrumbItems: BreadcrumbItem[] = [
  {
    title: 'Projects',
    href: '/projects',
  },
];

const SearchWord = ref('');
const IncludeArchived = ref(false);

defineProps<{
  status?: string;
  projects: Project[];
}>();
</script>
