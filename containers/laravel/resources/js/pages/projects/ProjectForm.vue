<template>
  <Form v-bind="formProps" class="flex flex-col gap-6" v-slot="{ errors, processing }">
    <Input :default-value="title" name="title" placeholder="Title" />
    <Input :default-value="description" name="description" placeholder="Description" />
    <MemberList :members="members" @update:status="updateStatus" @update:role="updateRole" />
    <AddMemberModal @addMember="addMember" />
    <Button type="submit" class="mt-4 w-full" :tabindex="4" :disabled="processing" data-test="submit-button">
      <LoaderCircle v-if="processing" class="h-4 w-4 animate-spin" />
      {{ submitText }}
    </Button>
  </Form>
</template>

<script setup lang="ts">
import { Input } from '@/components/ui/input';
import { Form } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { LoaderCircle } from 'lucide-vue-next';
import AddMemberModal from './AddMemberModal.vue';
import { type User, type Member } from '@/types';
import MemberList from './MemberList.vue';
import { ref } from 'vue';

const props = defineProps<{
  title: string;
  description: string;
  submitText?: string;
  members: Member[];
  formProps: Record<string, any>;
}>();

const members = ref(props.members);

const emit = defineEmits<{
  // 'update:title': [value: string];
  // 'update:description': [value: string];
  'add:members': [value: Member];
}>();

// const updateTitle = (event: Event) => {
//   const target = event.target as HTMLInputElement;
//   emit('update:title', target.value);
// };

// const updateDescription = (event: Event) => {
//   const target = event.target as HTMLInputElement;
//   emit('update:description', target.value);
// };

const addMember = (user: User) => {
  var member = {
    id: null,
    user_id: user.id,
    name: user.name,
    role: '',
    status: 'active',
    assigned_at: new Date().toISOString(),
  };
  members.value.push(member);
  // emit('add:members', member);
};

const updateStatus = (user_id: number, status: string) => {
  members.value.find(member => member.user_id === user_id)!.status = status;
};

const updateRole = (user_id: number, role: string) => {
  members.value.find(member => member.user_id === user_id)!.role = role;
};
</script>
