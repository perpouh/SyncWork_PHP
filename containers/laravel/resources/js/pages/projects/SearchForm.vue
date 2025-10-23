<template>
  <Form>
    <Input v-model="SearchWord" name="SearchWord" placeholder="Search" />
    <Checkbox v-model="IncludeArchived" name="IncludeArchived" />
  </Form>
</template>

<script setup lang="ts">
import { Checkbox } from '@/components/ui/checkbox';
import { Input } from '@/components/ui/input';
import { Form } from '@inertiajs/vue3';
import { ref } from 'vue';


const props = defineProps<{
  SearchWord: string;
  IncludeArchived: boolean;
}>();

const SearchWord = ref(props.SearchWord);
const IncludeArchived = ref(props.IncludeArchived);
</script>
