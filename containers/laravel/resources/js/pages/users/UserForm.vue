<template>
  <Form v-bind="UserController.store.form()" v-slot="{ errors, processing }">
    <div class="grid gap-2">
      <Label for="name">Name</Label>
      <Input id="name" type="text" name="name" v-model="inputName" />
      <InputError :message="errors.name" />
    </div>
  </Form>
</template>

<script setup lang="ts">
import UserController from '@/actions/App/Http/Controllers/UserController';
import InputError from '@/components/InputError.vue';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Form } from '@inertiajs/vue3';
import { ref } from 'vue';
import { type User } from '@/types';

const props = defineProps<{
  user: User;
}>();

const inputName = ref(props.user.name);
</script>
