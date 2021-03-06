
new Vue({
  el: '#app-vue',
  data() {
    return {
      users: [],
      loading: false,
      submitting: false,
      newUser: '',
    }
  },
  methods: {
    fetchUsers() {
      this.loading = true;
      this.users = [];

      axios.get('https://jsonplaceholder.typicode.com/users')
        .then((response) => {
          const data = response.data;
          this.users = data;
          this.loading = false;
        });
    },
    addUser() {
      this.submitting = true;
      axios.post('result.php', {
        name: this.newUser
      })
        .then((response) => {
          console.log(response.config.data);
          /*const data = response.data;
          this.users.push(data);
          this.newUser = '';
          this.submitting = false;*/
        });
    }
  }
});
