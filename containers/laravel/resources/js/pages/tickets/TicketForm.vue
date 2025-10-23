<template>
  <Form v-bind="formProps" class="flex flex-col gap-4" v-slot="{ errors, processing }">
    <Input type="text" name="title" placeholder="Title" :default-value="ticket.title" />
    <Textarea name="description" placeholder="Description" :default-value="ticket.description" />
    <Select :options="statusOptions" name="status" placeholder="Status" :default-value="ticket.status" />
    <Select :options="priorityOptions" name="priority" placeholder="Priority" :default-value="ticket.priority" />
    <Select :options="typeOptions" name="type" placeholder="Type" :default-value="ticket.type" />
    <Select :options="membersOptions" name="assignee_id" placeholder="Asignee" :default-value="ticket.assignee?.name ?? ''" />
    <Input type="hidden" name="reporter_id" :default-value="user.id" />
    <Button type="submit" :disabled="processing">Create Ticket</Button>
  </Form>
</template>

<script setup lang="ts">
import { Input } from '@/components/ui/input';
import { Textarea } from '@/components/ui/textarea';
import { Select } from '@/components/ui/select';
import { Button } from '@/components/ui/button';
import { Form } from '@inertiajs/vue3';
import type { Project, Ticket, Member } from '@/types';
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
const page = usePage();
const user = page.props.auth.user;

const props = defineProps<{
  project: Project;
  ticket: Ticket;
  formProps: Record<string, any>;
  members: Member[];
}>();

const statusOptions = [
  { label: 'Open', value: 'open' },
  { label: 'In Progress', value: 'in_progress' },
  { label: 'Pending', value: 'pending' },
  { label: 'Closed', value: 'closed' },
];

const priorityOptions = [
  { label: 'Low', value: 'low' },
  { label: 'Medium', value: 'medium' },
  { label: 'High', value: 'high' },
  { label: 'Critical', value: 'critical' },
];

const typeOptions = [
  { label: 'Bugfix', value: 'bugfix' },
  { label: 'Feature', value: 'feature' },
  { label: 'Task', value: 'task' },
  { label: 'Uncategorized', value: 'uncategorized' },
];

const membersOptions = computed(() => {
  return props.members.map((member) => {
    return { label: member.name, value: member.id?.toString() ?? '' };
  });
});
</script>
