<template>
  <span :class="classes" @click="toggle">
    <span v-text="count"></span>
    <i class="fas fa-heart"></i>
  </span>
</template>


<script>
export default {
  props: ["reply"],

  data() {
    return {
      count: this.reply.favoritesCount,
      isFavorited: this.reply.isFavorited
    };
  },

  methods: {
    toggle() {
      this.isFavorited ? this.unfavorite() : this.favorite();
    },

    unfavorite() {
      axios.delete(this.endpoint);

      this.count--;
      this.isFavorited = false;
    },

    favorite() {
      axios.post(this.endpoint);

      this.count++;
      this.isFavorited = true;
    }
  },

  computed: {
    endpoint() {
      return "/replies/" + this.reply.id + "/favorites";
    },

    classes() {
      return [this.isFavorited ? "liked" : ""];
    }
  }
};
</script>

<style>
</style>