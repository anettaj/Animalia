class Post {
  constructor(title, link, img) {
    this.title = title;
    this.link = link;
    this.img = img;
  }}


const app = new Vue({
  el: '#app',
  data: {
    search: '',
    postList: [
    new Post(
    'Add',
    '../pages/insert.php',

    'https://www.svgrepo.com/show/475030/add-image.svg'),

    new Post(
    'List',
    '../index.php',
    'https://www.svgrepo.com/show/485395/file.svg'),

    new Post(
      'Update',
      '../pages/update.php',
      'https://www.svgrepo.com/show/132898/update.svg'),
    
    new Post(
      'Suggestion',
      '../pages/response.php',
      'https://www.svgrepo.com/show/375789/contacts.svg')] },



  computed: {
    filteredList() {
      return this.postList.filter(post => {
        return post.title.toLowerCase().includes(this.search.toLowerCase());
      });
    } } });