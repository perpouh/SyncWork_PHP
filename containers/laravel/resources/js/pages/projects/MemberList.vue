<template>
  <div>
    <table>
      <thead>
        <tr>
          <th>Role</th>
          <th>Name</th>
          <th>Status</th>
          <th>Assigned At</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="member in members" :key="member.user_id">
          <td>
            <Select :options="roleOptions" name="members" :default-value="member.role"
              @update:modelValue="updateRole(member.user_id, $event)" />
          </td>
          <td>{{ member.name }}</td>
          <td>
            <Select :options="statusOptions" :default-value="member.status"
              @update:modelValue="updateStatus(member.user_id, $event)" />
          </td>
          <td>{{ member.assigned_at }}</td>
        </tr>
      </tbody>
    </table>
    <div v-for="(member, index) in members" :key="member.user_id">
      <Input type="hidden" :name="`members[${index}].id`" :default-value="member.id ?? ''" />
      <Input type="hidden" :name="`members[${index}].user_id`" :default-value="member.user_id" />
      <Input type="hidden" :name="`members[${index}].role`" :default-value="member.role" :model-value="member.role" />
      <Input type="hidden" :name="`members[${index}].status`" :default-value="member.status" :model-value="member.status" />
      <Input type="hidden" :name="`members[${index}].assigned_at`" :default-value="member.assigned_at" />
    </div>
  </div>
</template>

<script setup lang="ts">
import { type Member } from '@/types';
import { Select } from '@/components/ui/select';
import { Input } from '@/components/ui/input';

defineProps<{
  members: Member[];
}>();

const emit = defineEmits<{
  (e: 'update:status', user_id: number, status: string): void;
  (e: 'update:assigned_at', user_id: number, assigned_at: string): void;
  (e: 'update:role', user_id: number, role: string): void;
}>();

const roleOptions = [
  { label: 'Manager', value: 'manager' },
  { label: 'Member', value: 'member' },
];

const statusOptions = [
  { label: 'Active', value: 'active' },
  { label: 'Inactive', value: 'inactive' },
];

const updateStatus = (user_id: number, status: string) => {
  emit('update:status', user_id, status);
};

const updateRole = (user_id: number, role: string) => {
  emit('update:role', user_id, role);
};
</script>
