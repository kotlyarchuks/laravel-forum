<script>
export default {
  props: ["reply"],

  data() {
    return {
      editing: false,
      body: this.reply.body
    };
  },

  methods: {
    submit() {
      axios.patch("/replies/" + this.reply.id, {
        body: this.body
      });

      this.editing = false;
    }
  }
};
</script>

<style>
</style>