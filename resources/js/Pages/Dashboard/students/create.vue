<template>
    <layout>

        <div class="mt-8">
            <div class="flex">
                <h2 class="text-3xl text-indigo-500 font-bold">Students /<span class="text-gray-700"> Create</span></h2>
            </div>

            <base-panel class="md:max-w-3xl mt-4">
                <form @submit.prevent="submit">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <base-input label="Name" name="name" v-model="form.name" :error="$page.errors.name" required></base-input>
                        </div>
                        <div>
                            <base-input type="email" label="Email address" name="email" v-model="form.email" :error="$page.errors.email" required></base-input>
                        </div>
                     <div>
                            <label class="block" for="">
                                <span class="text-gray-700">
                                Country
                                </span>

                                <select class="form-input border-gray-300 focus:border-indigo-400 focus:shadow-none focus:bg-white mt-1 block w-full" name="country_id" v-model="form.country_id">
                                    <option value="">Choose</option>

                                    <option :value="country.id" v-for="country in countries" :key="country.index">
                                        {{country.name}}
                                    </option>
                                </select>
                            </label>
                        </div>
                              <div>
                            <label class="block" for="">
                                <span class="text-gray-700">
                                Class
                                </span>

                                <select class="form-input border-gray-300 focus:border-indigo-400 focus:shadow-none focus:bg-white mt-1 block w-full" name="classe_id" v-model="form.classe_id">
                                    <option value="">Choose</option>
                                    <option :value="classe.id" v-for="classe in classes" :key="classe.index">
                                        {{classe.name}}
                                    </option>
                                </select>
                            </label>
                        </div>
                   
                    </div>
                    <div class="flex justify-end mt-4">
                        <base-button primary>Create Student</base-button>
                    </div>
                </form>
            </base-panel>

        </div>

    </layout>
</template>

<script>
import Layout from "../../../Shared/Layout";

export default {
  components: { Layout },
      props:['countries','classes'],

  data() {
    return {
      form: {
        name: "",
        email: "",
        country_id: "",
        classe_id: "",
      },
    };
  },
  methods: {
    submit() {
      this.$inertia.post("/dashboard/students", this.form);
    },
  },
};
</script>
