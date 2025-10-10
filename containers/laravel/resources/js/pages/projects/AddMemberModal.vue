<template>
  <Dialog >
    <DialogTrigger as-child>
      <Button>Add Member</Button>
    </DialogTrigger>
    <DialogContent>
      <DialogHeader>
        <DialogTitle>Add Member</DialogTitle>
      </DialogHeader>
      <Form v-slot="{ errors, processing }">
        <div class="grid gap-2">
          <Label for="name">名前</Label>
          <Input id="name" name="name" v-model="name" />
          <Label for="email">メールアドレス</Label>
          <Input id="email" name="email" v-model="email" />
          <Button type="button" @click="searchUsers" :disabled="processing">検索</Button>
        </div>
      </Form>
      <div class="grid gap-2">
        <div v-for="user in users" :key="user.id">
          <p>{{ user.name }}</p>
        </div>
      </div>
    </DialogContent>
  </Dialog>
</template>

<script setup lang="ts">
import { Dialog } from '@/components/ui/dialog';
import { Button } from '@/components/ui/button';
import { DialogTrigger } from '@/components/ui/dialog';
import { DialogContent } from '@/components/ui/dialog';
import { DialogHeader } from '@/components/ui/dialog';
import { DialogTitle } from '@/components/ui/dialog';
import { Form } from '@inertiajs/vue3';
import { Label } from '@/components/ui/label';
import { Input } from '@/components/ui/input';
import type { User } from '@/types';
import { ref } from 'vue';
import axios from 'axios';
const name = ref('');
const email = ref('');
const users = ref<User[]>([]);
const searchUsers = async () => {
  const response = await axios.get('/api/users', { params: { name: name.value, email: email.value } });
  users.value = response.data;
};
</script>