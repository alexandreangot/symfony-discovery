<template>
  
    <form @submit.prevent="addTask" class="flex flex-col items-center">
      <input v-model="newTask" class="border rounded-lg px-3 py-2 mb-4" type="text" placeholder="Ajouter une tâche...">
    </form>
    <ul>
        <li v-for="(task, index) in tasks" :key="index" class="flex justify-between items-center border-b py-2">
            <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600 mx-5" v-model="task.completed">
            <span :class="{'line-through': task.completed}" class="flex-grow">{{ task.description }}</span>
            <button @click="deleteTask(index)" class="bg-red-500 text-white px-3 py-1 rounded-lg mx-5">Supprimer</button>
        </li>
    </ul>
</template>

<script>
export default {
  data() {
    return {
      tasks: [
        { description: 'Faire les courses', completed: false },
        { description: 'Faire le ménage', completed: false },
        { description: 'Sortir le chien', completed: true },
      ],
      newTask: '',
    }
  },
  methods: {
    addTask() {
      this.tasks.push({ description: this.newTask, completed: false });
      this.newTask = '';
    },
    deleteTask(index) {
      this.tasks.splice(index, 1);
    },
  },
}
</script>
