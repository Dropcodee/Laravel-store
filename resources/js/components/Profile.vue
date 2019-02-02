
 <style scoped>
.widget-user-header {
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center center;
  height: 300px;
}
.widget-user .widget-user-image > img {
  width: 150px;
  height: 150px;
  border-radius: 50%;
}
</style>

<template>
  <div class="container">
    <div class="col-md-12 mt-5">
      <div class="card card-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div
          class="widget-user-header text-white"
          style="background-image: url('./svg/profile.jpg');"
        >
          <h3 class="widget-user-username">{{ form.name }}</h3>
          <h5 class="widget-user-desc">{{ form.type }}</h5>
        </div>
        <div class="widget-user-image">
          <img class="img-circle elevation-2" :src="setUserImage()" alt="User Avatar">
        </div>
      </div>

      <!-- activity section-->
      <div class="card">
        <div class="card-header p-2">
          <ul class="nav nav-pills">
            <li class="nav-item">
              <a class="nav-link active" href="#activity" data-toggle="tab">Activity</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#settings" data-toggle="tab">Settings</a>
            </li>
          </ul>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="tab-content">
            <div class="active tab-pane" id="activity">
              <h2>No Activities Yet...</h2>
            </div>
            <div class="tab-pane" id="settings">
              <form class="form-horizontal">
                <div class="form-group">
                  <label for="inputName" class="col-sm-4 control-label">Name</label>

                  <div class="col-sm-10">
                    <input
                      type="text"
                      v-model="form.name"
                      class="form-control"
                      :class="{ 'is-invalid': form.errors.has('name') }"
                      name="name"
                      placeholder="Your Name"
                    >
                    <has-error :form="form" field="name"></has-error>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-4 control-label">Email</label>

                  <div class="col-sm-10">
                    <input
                      type="email"
                      v-model="form.email"
                      class="form-control"
                      :class="{ 'is-invalid': form.errors.has('email') }"
                      name="email"
                      placeholder="Your Email"
                    >
                    <has-error :form="form" field="email"></has-error>
                  </div>
                </div>
                <div class="form-group">
                  <label
                    for="inputName2"
                    name="profileImage"
                    class="col-sm-4 control-label"
                  >Upload Picture</label>

                  <div class="col-sm-10">
                    <input
                      type="file"
                      @change="convertImage"
                      class="form-input"
                      name="photo"
                      placeholder="upload"
                    >
                    <has-error :form="form" field="photo"></has-error>
                  </div>
                  <div class="form-group">
                    <label for="password" class="col-sm-4 control-label">Password</label>

                    <div class="col-sm-10">
                      <input
                        class="form-control"
                        :class="{ 'is-invalid': form.errors.has('password') }"
                        name="password"
                        placeholder="Your Password"
                        v-model="form.password"
                      >
                      <has-error :form="form" field="password"></has-error>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" @click.prevent="updateInfo" class="btn btn-danger">Submit</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.nav-tabs-custom -->
      <!-- activity section-->
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: new Form({
        id: "",
        name: " ",
        email: " ",
        password: " ",
        type: " ",
        photo: ""
      })
    };
  },
  methods: {
    setUserImage() {
      return "svg/profile/" + this.form.photo;
    },

    convertImage(e) {
      let file = e.target.files[0];
      console.log(file);
      let reader = new FileReader();
      if (file["size"] < 2111775) {
        reader.onloadend = file => {
          this.form.photo = reader.result;
        };
        reader.readAsDataURL(file);
      } else {
        this.$Progress.fail();
        Swal.fire("Failed !", "File Size Too Large, maximum is 2MB", "warning");
      }
    },

    updateInfo() {
      this.$Progress.start();
      if (this.form.password == "") {
        this.form.password = undefined;
      }
      this.form
        .put("api/profile")
        .then(() => {
          Toast.fire({
            type: "success",
            title: "Profile Updated Successfully"
          });
          this.$Progress.finish();
        })
        .catch(() => {
          this.$Progress.fail();
          Swal.fire("Failed !", "Something went wrong, Try Again", "warning");
        });
    }
  },
  created() {
    axios
      .get("api/profile")
      .then(({ data }) => {
        this.$Progress.start();
        this.form.fill(data);
      })
      .catch(() => {
        this.$Progress.fail();
      });
  }
};
</script>
