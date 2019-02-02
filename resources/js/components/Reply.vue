<template>
  <div class="columns threads__list__item">
    <div class="column is-1">
      <div class="thread__img"></div>
    </div>
    <div class="column is-11 thread__content">
      <div class="thread__head">
        <div class="thread__head__main">
          <h4 class="thread__title is-inline">
            <a :href="'/profiles/'+user">{{user}}</a>
          </h4>
          <span class="thread__info">- <span v-text="ago"></span></span>
        </div>
        <div v-if="canUpdate" class="thread__head__meta">
          <!-- Edit and delete buttons for authorized only -->
          <!-- @can('update', $reply) -->
          <span class="thread__edit" @click="editing=true">
            <i class="fas fa-pencil-alt"></i>
          </span>
          <span class="thread__delete" @click="destroy">
            <i class="fas fa-trash-alt"></i>
          </span>
          <!-- @endcan -->
        </div>
      </div>
      <div class="thread__body">
        <div v-if="editing" class="control">
          <div class="thread__edit__input">
            <input class="input" type="text" v-model="body">
          </div>
          <div class="thread__edit__buttons">
            <span class="thread__edit__ok" @click="submit">
              <i class="fas fa-check-circle"></i>
            </span>
            <span class="thread__edit__cancel" @click="editing=false">
              <i class="fas fa-ban"></i>
            </span>
          </div>
        </div>
        <p v-else v-text="body"></p>
      </div>
      <div v-if="signedIn" class="thread__info thread__like">
        <favorite :reply="reply" @deleted></favorite>
      </div>
    </div>
  </div>
</template>

<script>
import Favorite from "./Favorite.vue";
import moment from 'moment'

export default {
  props: ["reply"],

  components: { Favorite },

  data() {
    return {
      editing: false,
      body: this.reply.body,
      user: this.reply.user.name
    };
  },

  methods: {
    submit() {
      axios.patch("/replies/" + this.reply.id, {
        body: this.body
      });

      this.editing = false;
    },

    destroy() {
      axios.delete("/replies/" + this.reply.id);

      this.$emit("deleted", this.reply.id);
      //   $(this.$el).fadeOut(300);
    }
  },

  computed: {
    signedIn() {
      return window.App.signedIn;
    },

    canUpdate() {
      return this.authorize(user => this.reply.user_id == user.id);
    },

    ago(){
      return moment(this.reply.created_at).fromNow()
    }
  }
};
</script>

<style>
</style>