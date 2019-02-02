<template>
  <div class="container">
    <div class="uk-card uk-card-hover uk-card-body" v-for="company in companies" :key="company.id">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Company's Information</h3>
          <button
            class="btn btn-success"
            style="float: right;"
            @click.prevent="editModal(company)"
          >Update Company Info</button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <h3>
            <i class="fas fa-store-alt"></i> Company Name
          </h3>

          <h5 class="dropcode__mleft">
            <i class="fas fa-arrow-right"></i>
            {{company.name}}
          </h5>

          <hr>

          <h3>
            <i class="fa fa-book mr-1"></i> About Our Company
          </h3>

          <h5 class="dropcode__mleft">
            <i class="fas fa-arrow-right"></i>
            {{company.about}}
          </h5>

          <hr>

          <h3>
            <i class="fa fa-map-marker mr-1"></i> Company Location
          </h3>

          <h5 class="dropcode__mleft">
            <i class="fas fa-arrow-right"></i>
            {{company.location}}, {{company.country}}
          </h5>

          <hr>

          <h3>
            <i class="far fa-envelope"></i> Company Emails
          </h3>

          <h5 class="dropcode__mleft">
            <span class="tag tag-danger">
              <i class="fas fa-arrow-right"></i>
              {{company.email}},
            </span>
            <br>
            <span class="tag tag-success">
              <i class="fas fa-arrow-right"></i>
              {{company.emailTwo}}
            </span>
          </h5>

          <hr>

          <h3>
            <i class="fas fa-mobile-alt"></i> Company Call Desk
          </h3>

          <h5 class="dropcode__mleft">
            <span class="tag tag-danger">
              <i class="fas fa-arrow-right"></i>
              {{company.phone}},
            </span>
            <br>
            <span class="tag tag-success">
              <i class="fas fa-arrow-right"></i>
              {{company.phoneTwo}}
            </span>
          </h5>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
    <div
      class="modal fade"
      id="addNew"
      role="dialog"
      aria-labelledby="addNewLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addNewLabel" v-show="editMode">Update Company Info</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="updateCompany()">
            <div class="modal-body">
              <div class="form-group">
                <label for="name">Enter Company Name:</label>
                <input
                  v-model="form.name"
                  type="text"
                  name="name"
                  placeholder="Enter Company's Name"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('name') }"
                >
                <has-error :form="form" field="name"></has-error>
              </div>
              <div class="form-group">
                <label for="location">Enter Company Location:</label>
                <input
                  v-model="form.location"
                  type="text"
                  name="location"
                  placeholder="Enter Company's Location"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('location') }"
                >
                <has-error :form="form" field="location"></has-error>
              </div>
              <div class="form-group">
                <label for="country">Enter Company Country:</label>
                <input
                  v-model="form.country"
                  type="text"
                  name="country"
                  placeholder="Enter Company's Country"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('country') }"
                >
                <has-error :form="form" field="country"></has-error>
              </div>
              <div class="form-group">
                <label for="email">Enter Company's Email:</label>
                <input
                  v-model="form.email"
                  type="email"
                  name="email"
                  placeholder="Enter Email"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('email') }"
                >
                <has-error :form="form" field="email"></has-error>
              </div>
              <div class="form-group">
                <label for="emailTwo">Enter Company Second Mail(Optional):</label>
                <input
                  v-model="form.emailTwo"
                  type="email"
                  name="emailTwo"
                  placeholder="Enter Company's Second Mail"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('emailTwo') }"
                >
                <has-error :form="form" field="emailTwo"></has-error>
              </div>
              <div class="form-group">
                <label for="phone">Enter Company Phone Number</label>
                <input
                  v-model="form.phone"
                  type="text"
                  name="phone"
                  placeholder="Enter Company's Phone Number"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('phone') }"
                >
                <has-error :form="form" field="phone"></has-error>
              </div>
              <div class="form-group">
                <label for="phoneTwo">Enter Company Second Phone(Optional):</label>
                <input
                  v-model="form.phoneTwo"
                  type="text"
                  name="phoneTwo"
                  placeholder="Enter Company's Second Phone"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('phoneTwo') }"
                >
                <has-error :form="form" field="phoneTwo"></has-error>
              </div>
              <div class="form-group">
                <label for="about">About Our Company:</label>
                <textarea
                  v-model="form.about"
                  type="text"
                  name="about"
                  placeholder="Details about our company..."
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('about') }"
                ></textarea>
                <has-error :form="form" field="about"></has-error>
              </div>
              <div class="form-group">
                <label for="photo" name="profileImage" class="col-sm-4 control-label">Upload Picture</label>

                <div class="col-sm-10">
                  <input
                    type="file"
                    @change="convertPhoto"
                    class="form-input"
                    :class="{ 'is-invalid': form.errors.has('photo') }"
                    name="photo"
                    placeholder="upload"
                  >
                  <has-error :form="form" field="photo"></has-error>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">
                Close
                <i class="fas fa-times"></i>
              </button>
              <button type="submit" class="btn btn-success" v-show="!editMode">
                Create
                <i class="fas fa-check"></i>
              </button>
              <button type="submit" class="btn btn-success" v-show="editMode">
                Update
                <i class="fas fa-check"></i>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Form from "vform";
import { HasError, AlertError } from "vform";

Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);
let mv = this;
export default {
  data() {
    return {
      // editmode for modal
      editMode: true,
      // users object -
      //stores company details after fetching from db
      companies: {},
      // form data -
      //collects data from the input forms and stores them for POST request
      form: new Form({
        id: "",
        name: "",
        location: "",
        about: "",
        country: "",
        email: "",
        emailTwo: "",
        phone: "",
        phonetwo: "",
        photo: ""
      })
    };
  },
  methods: {
    convertPhoto(e) {
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
    // method for creating a new user
    // POST request
    createCompany: function createCompany() {
      // starts the progress bar before api is sent
      this.$Progress.start();
      // api is sent to the controller
      //creates new user
      this.form
        .post("api/company")
        .then(({ data }) => {
          // if request is a success
          // catches an event or change of data
          // calls a function for refeshing of table Signal.$on()
          Signal.$emit("AfterRequest");
          // toast alert for success message
          //user created
          Toast.fire({
            type: "success",
            title: "Company Information Created successfully"
          });
          // ends progress bar
          this.$Progress.finish();
        })
        .catch(() => {
          this.$Progress.fail();
          Swal.fire("Failed !", "Something went wrong...", "warning");
          Signal.$emit("AfterRequest");
        });
    },

    // method for getting all the users
    // GET request to api/user
    fetchCompany: function fetchCompany(company) {
      axios.get("api/company").then(({ data }) => (this.companies = data));
    },

    updateCompany: function updateCompany() {
      this.$Progress.start();
      if (this.form.phonetwo === "") {
        this.form.phonetwo = undefined;
      }
      this.form
        .patch("api/company/" + this.form.id)
        .then(() => {
          // success
          $("#addNew").modal("hide");
          Swal.fire(
            "Updated!",
            " Company Information has been updated.",
            "success"
          );
          Signal.$emit("AfterRequest");
          this.$Progress.finish();
        })
        .catch(() => {
          this.$Progress.fail();
          $("#addNew").modal("hide");
          Swal.fire("Failed !", "Something went wrong...", "warning");
          Signal.$emit("AfterRequest");
        });
    },
    editModal: function addNewModal(company) {
      this.form.reset();
      $("#addNew").modal("show");
      this.form.fill(company);
    }
  },
  // created method to load the fetchAllUsers()
  created() {
    this.fetchCompany();
    // signal or event gotten for table refresh Signal.$emit
    Signal.$on("AfterRequest", () => {
      this.fetchCompany();
    });
  }
};
</script>
