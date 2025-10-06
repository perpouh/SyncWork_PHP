<template>
  <AppLayout :breadcrumbs="breadcrumbItems">
    <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
      <h1>Users</h1>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="user in users" :key="user.id">
            <td>{{ user.id }}</td>
            <td>{{ user.name }}</td>
            <td>{{ user.email }}</td>
            <td>TODO</td>
            <td>
              <Link :href="edit(user.id)">Edit</Link>
              <Link :href="destroy(user.id)">Delete</Link>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </AppLayout>
</template>
<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type User, type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { edit, destroy } from '@/routes/users';

const breadcrumbItems: BreadcrumbItem[] = [
  {
    title: 'Users',
    href: '/users',
  },
];

defineProps<{
  status?: string;
  users: User[];
}>();
</script>
