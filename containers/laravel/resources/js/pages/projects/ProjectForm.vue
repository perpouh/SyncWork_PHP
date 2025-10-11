<template>
  <Form v-bind="formProps" class="flex flex-col gap-6" v-slot="{ errors, processing }">
    <Input :default-value="title" @input="updateTitle" name="title" placeholder="Title" />
    <Input :default-value="description" @input="updateDescription" name="description"
      placeholder="Description" />
      <MemberList :members="members" />
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
  'update:title': [value: string];
  'update:description': [value: string];
  'update:members': [value: Member];
}>();

const updateTitle = (event: Event) => {
  const target = event.target as HTMLInputElement;
  emit('update:title', target.value);
};

const updateDescription = (event: Event) => {
  const target = event.target as HTMLInputElement;
  emit('update:description', target.value);
};

const addMember = (user: User) => {
  emit('update:members', {
    id: user.id,
    name: user.name,
    role: user.role,
    status: 'active',
    assigned_at: new Date().toISOString(),
  });
};
</script>
