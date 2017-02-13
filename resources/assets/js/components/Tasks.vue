<template>
  <div>
    <form action="#" @submit.prevent="edit ? updateTask(task.id) : createTask()">
      <div class="input-field">
        <input v-model="task.body" ref:taskinput type="text" name="body" class="validate">
        <div class="secondary-content">
          <button v-show="!edit" type="submit" class="btn">New Task</button>
          <button v-show="edit" type="submit" class="btn blue darken-2">Update</button>
        </div>
      </div>
    </form>
    <h3>TO DO List</h3>
    <ul class="collection">
      <li class="collection-item" v-for="task in list">
        {{ task.body }}
        <div class="secondary-content">
        <button @click="showTask(task.id)" class="btn blue darken-2">Update</button>
        <button @click="deleteTask(task.id)" class="btn red darken-2">Delete</button>
        </div>
      </li>
    </ul>
  </div>
</template>

<script>
  export default {

    data: function () {
      return {
        edit: false,
        list: [],
        task: {
          id: '',
          body: ''
        }
      };
    },

    mounted: function () {
      this.fetchTaskList();
    },

    methods: {
      fetchTaskList: function () {
        this.$http.get('api/tasks').then(function (response) {
          this.list = response.data
        });

      },

      createTask: function () {
        this.$http.post('api/task/store', this.task)
        this.task.body = ''
        this.edit = false
        this.fetchTaskList()
      },

      updateTask: function (id) {
        this.$http.patch('api/task/' + id, this.task)
        this.task.body = ''
        this.edit = false
        this.fetchTaskList()
      },

      showTask: function (id) {
        this.$http.get('api/task/' + id).then(function (response) {
          this.task.id = response.body.id
          this.task.body = response.body.body
        })
        this.edit = true;
      },

      deleteTask: function (id) {
        this.$http.delete('api/task/' + id)
        this.fetchTaskList()
      },
    }
  }
</script>