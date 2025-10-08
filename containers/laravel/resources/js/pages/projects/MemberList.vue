<template>
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
      <tr v-for="member in members" :key="member.id">
        <td>{{ member.role }}</td>
        <td>{{ member.name }}</td>
        <td>{{ member.status }}</td>
        <td>{{ member.assigned_at }}</td>
      </tr>
    </tbody>
  </table>
</template>

<script setup lang="ts">
import { type Member } from '@/types';

defineProps<{
  members: Member[];
}>();
</script>
