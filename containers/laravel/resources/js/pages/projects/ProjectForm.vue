<template>
  <Form v-bind="store.form()" class="flex flex-col gap-6" v-slot="{ errors, processing }">
    <Input :value="title" @input="updateTitle" name="title" placeholder="Title" />
    <Input :value="description" @input="updateDescription" name="description"
      placeholder="Description" />
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
import { store } from '@/routes/projects';

const props = defineProps<{
  title: string;
  description: string;
  submitText?: string;
}>();

const emit = defineEmits<{
  'update:title': [value: string];
  'update:description': [value: string];
}>();

const updateTitle = (event: Event) => {
  const target = event.target as HTMLInputElement;
  emit('update:title', target.value);
};

const updateDescription = (event: Event) => {
  const target = event.target as HTMLInputElement;
  emit('update:description', target.value);
};
</script>