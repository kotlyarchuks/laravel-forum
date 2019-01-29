<script>
export default {
  props: ["item"],

  data() {
    return {};
  },

  methods: {
    destroy() {
      // console.log(this.item);
      axios
        .delete("/replies/" + this.item)
        .then(function(response) {
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  }
};
</script>

<style>
</style>