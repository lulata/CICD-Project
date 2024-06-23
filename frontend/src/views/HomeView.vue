<template>
  <h1>New note</h1>
  <input type="text" v-model="note" />

  <button @click="addNote">Add Note</button>
  <h1>Notes</h1>

  <ul>
    <li v-for="note in notes" :key="note.id">{{ note.data }}</li>
  </ul>
</template>

<script lang="ts" setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

const notes = ref<
  {
    id: number;
    data: string;
  }[]
>();
const note = ref<string>('');

onMounted(() => {
  getNotes();
});

function getNotes() {
  axios.get('http://localhost:8081/api/notes').then((response) => {
    notes.value = response.data;
  });
}

function addNote() {
  axios.post('http://localhost:8081/api/notes', { data: note.value }).then(() => {
    getNotes();
    note.value = '';
    console.log('Note added');
  });
}
</script>
