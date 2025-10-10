<template>
  <AppLayout :breadcrumbs="breadcrumbItems">
    <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
      <h1>{{ project.title }}</h1>
      <MemberList :members="project.members" />
      <AddMemberModal @addMember="addMember" />
    </div>
  </AppLayout>
</template>

<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { type Project, type Member } from '@/types';
import MemberList from './MemberList.vue';
import AddMemberModal from './AddMemberModal.vue';
import { type User } from '@/types';

const breadcrumbItems: BreadcrumbItem[] = [
  {
    title: 'Projects',
    href: '/projects',
  },
];

const props = defineProps<{
  project: Project;
}>();

const addMember = (user: User) => {
  props.project.members.push({
    id: user.id,
    name: user.name,
    role: user.role,
    status: 'active',
    assigned_at: new Date().toISOString(),
  });
};

</script>
