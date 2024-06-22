<template>
  <h1>New note</h1>
  <input type="text" v-model="note" />

  <button @click="addNote">Add Note</button>
  <h1>Notes</h1>

  <ul>
    <li v-for="note in notes" :key="note">{{ note }}</li>
  </ul>

  <button @click="getNotes">Get Notes</button>
</template>

<script lang="ts" setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

const notes = ref<string[]>();
const note = ref<string>('');

onMounted(() => {
  getNotes;
});

function getNotes() {
  axios.get('/api/notes').then((response) => {
    notes.value = response.data;
  });
}

function addNote() {
  axios.post('/api/notes', { note: note.value }).then(() => {
    getNotes();
    note.value = '';
  });
}
</script>
