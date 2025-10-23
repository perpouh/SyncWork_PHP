<template v-bind="index.form({project_id: project.id})">
  <Form>
    <Label for="title">タイトル</Label>
    <Input type="text" name="filter[title]" placeholder="チケットタイトル" :default-value="title" />
    <Label for="status">ステータス</Label>
    <Select :options="statusOptions" name="filter[status]" placeholder="Status" :default-value="status" />
    <Label for="priority">優先度</Label>
    <Select :options="priorityOptions" name="filter[priority]" placeholder="Priority" :default-value="priority" />
    <Label for="type">チケット種別</Label>
    <Select :options="typeOptions" name="filter[type]" placeholder="Type" :default-value="type" />
    <Label for="assignee">担当者</Label>
    <Select :options="membersOptions" name="filter[assignee]" placeholder="Assignee" />
    <Label for="reporter">報告者</Label>
    <Select :options="membersOptions" name="filter[reporter]" placeholder="Reporter" />
    <Button type="submit">検索</Button>
    <Button type="reset" @click="reset">検索条件のリセット</Button>
  </Form>
</template>

<script setup lang="ts">
import { Input } from '@/components/ui/input';
import { Select } from '@/components/ui/select';
import { Form } from '@inertiajs/vue3';
import { ref } from 'vue';
import type { Member, Project } from '@/types';
import { computed } from 'vue';
import { index } from '@/routes/tickets';


const props = defineProps<{
  project: Project;
  members: Member[];
  title: string;
  status: string;
  priority: string;
  type: string;
  assignee: string;
  reporter: string;
}>();

const title = ref(props.title);
const status = ref(props.status);
const priority = ref(props.priority);
const type = ref(props.type);
const assignee = ref(props.assignee);
const reporter = ref(props.reporter);

const statusOptions = ref([
  { label: 'Open', value: 'open' },
  { label: 'In Progress', value: 'in_progress' },
  { label: 'Pending', value: 'pending' },
  { label: 'Closed', value: 'closed' },
]);
const priorityOptions = ref([
  { label: 'Low', value: 'low' },
  { label: 'Medium', value: 'medium' },
  { label: 'High', value: 'high' },
  { label: 'Critical', value: 'critical' },
]);
const typeOptions = ref([
  { label: 'Bugfix', value: 'bugfix' },
  { label: 'Feature', value: 'feature' },
  { label: 'Task', value: 'task' },
  { label: 'Uncategorized', value: 'uncategorized' },
]);

const membersOptions = computed(() => {
  return props.members.map((member) => {
    return { label: member.name, value: member.id?.toString() ?? '' };
  });
});

const reset = () => {
  title.value = '';
  status.value = '';
  priority.value = '';
  type.value = '';
  assignee.value = '';
  reporter.value = '';
};
</script>
