<template>
  <div class="container">
    <div class="card" v-if="$AuthScript.isAdminOrAuthor()">
      <div class="card-header">
        <h3 class="card-title">All Product Category</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <div id="example1_filter" class="dataTables_filter">
                <label>
                  Search:
                  <input
                    type="search"
                    class="form-control form-control-sm"
                    placeholder
                    aria-controls="example1"
                  >
                </label>
              </div>
            </div>
            <div class="col-sm-12 col-md-6">
              <button class="btn btn-success" style="float: right;" @click="addNewModal">
                Add Product Category
                <i class="fas fa-user-plus fa-fw"></i>
              </button>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <table
                id="example1"
                class="table table-bordered table-striped dataTable table-responsive"
                role="grid"
                aria-describedby="example1_info"
              >
                <thead>
                  <tr role="row">
                    <th
                      class="sorting_asc"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-sort="ascending"
                      aria-label="Rendering engine: activate to sort column descending"
                      style="width: 170px;"
                    >ID</th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label="Platform(s): activate to sort column ascending"
                      style="width: 194px;"
                    >Category Name</th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label="Platform(s): activate to sort column ascending"
                      style="width: 194px;"
                    >Category Status</th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label="Engine version: activate to sort column ascending"
                      style="width: 143px;"
                    >created Date</th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label="CSS grade: activate to sort column ascending"
                      style="width: 101px;"
                    >Edit</th>
                    <th
                      class="sorting"
                      tabindex="0"
                      aria-controls="example1"
                      rowspan="1"
                      colspan="1"
                      aria-label="CSS grade: activate to sort column ascending"
                      style="width: 101px;"
                    >Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="tag in tags" :key="tag.id" role="row" class="odd">
                    <td class="sorting_1">{{ tag.id }}</td>
                    <td>{{ tag.name }}</td>
                    <td>
                      <span
                        data-toggle="tooltip"
                        title="3 New Messages"
                        class="badge bg-success"
                        v-show="tag.status"
                      >Available</span>
                      
                      <span
                        data-toggle="tooltip"
                        title="3 New Messages"
                        class="badge bg-danger"
                        v-show="!tag.status"
                      >Not Available</span>
                    </td>
                    <td>{{ tag.created_at | dateFilter}}</td>
                    <td>
                      <a href @click.prevent="editModal(tag)">
                        <button class="btn btn-primary">
                          Edit
                          <i class="fas fa-edit"></i>
                        </button>
                      </a>
                    </td>
                    <td>
                      <a href @click.prevent="deleteUser(tag.id)">
                        <button class="btn btn-danger">
                          Delete
                          <i class="fas fa-trash"></i>
                        </button>
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-md-5">
              <div
                class="dataTables_info"
                id="example1_info"
                role="status"
                aria-live="polite"
              >Showing 1 to 10 of 57 entries</div>
            </div>
            <div class="col-sm-12 col-md-7">
              <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                <ul class="pagination">
                  <li class="paginate_button page-item previous disabled" id="example1_previous">
                    <a
                      href="#"
                      aria-controls="example1"
                      data-dt-idx="0"
                      tabindex="0"
                      class="page-link"
                    >Previous</a>
                  </li>
                  <li class="paginate_button page-item active">
                    <a
                      href="#"
                      aria-controls="example1"
                      data-dt-idx="1"
                      tabindex="0"
                      class="page-link"
                    >1</a>
                  </li>
                  <li class="paginate_button page-item">
                    <a
                      href="#"
                      aria-controls="example1"
                      data-dt-idx="2"
                      tabindex="0"
                      class="page-link"
                    >2</a>
                  </li>
                  <li class="paginate_button page-item">
                    <a
                      href="#"
                      aria-controls="example1"
                      data-dt-idx="3"
                      tabindex="0"
                      class="page-link"
                    >3</a>
                  </li>
                  <li class="paginate_button page-item">
                    <a
                      href="#"
                      aria-controls="example1"
                      data-dt-idx="4"
                      tabindex="0"
                      class="page-link"
                    >4</a>
                  </li>
                  <li class="paginate_button page-item">
                    <a
                      href="#"
                      aria-controls="example1"
                      data-dt-idx="5"
                      tabindex="0"
                      class="page-link"
                    >5</a>
                  </li>
                  <li class="paginate_button page-item">
                    <a
                      href="#"
                      aria-controls="example1"
                      data-dt-idx="6"
                      tabindex="0"
                      class="page-link"
                    >6</a>
                  </li>
                  <li class="paginate_button page-item next" id="example1_next">
                    <a
                      href="#"
                      aria-controls="example1"
                      data-dt-idx="7"
                      tabindex="0"
                      class="page-link"
                    >Next</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>

    <!-- adding create user modal -->
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
            <h5 class="modal-title" id="addNewLabel" v-show="!editMode">Create a new Category</h5>
            <h5 class="modal-title" id="addNewLabel" v-show="editMode">Update Category Info</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="editMode ? updateCategory() : createCategory()">
            <div class="modal-body">
              <div class="form-group">
                <label for="name">Enter Category Name:</label>
                <input
                  v-model="form.name"
                  type="text"
                  name="name"
                  placeholder="Enter Category Name"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('name') }"
                >
                <has-error :form="form" field="name"></has-error>
              </div>
              <div class="form-group">
                <label for="status">Select Category Status:</label>
                <select
                  v-model="form.type"
                  name="type"
                  id="type"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('status') }"
                >
                  <option>Select Category Status</option>
                  <option v-bind:value="1">Available</option>
                  <option v-bind:value="0">Not Available</option>
                </select>
                <has-error :form="form" field="status"></has-error>
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
    <!-- modal  for adding users -->
  </div>
</template>

<script>
import Form from "vform";
import { HasError, AlertError } from "vform";

Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

export default {
  data() {
    return {
      // editmode for modal
      editMode: false,
      // users object -
      //stores users after fetching from db
      tags: {},
      // form data -
      //collects data from the input forms and stores them for POST request
      form: new Form({
        id: "",
        name: " ",
        type: "",
        status: ""
      })
    };
  },
  methods: {
    // method for creating a new user
    // POST request
    createCategory: function createCategory() {
      // starts the progress bar before api is sent
      this.$Progress.start();
      // api is sent to the controller
      //creates new user
      if (this.form.type === 1) {
        this.form.status = 1;
      } else {
        this.form.status = 0;
      }
      this.form
        .post("api/category")
        .then(({ data }) => {
          // if request is a success
          //hides modal
          $("#addNew").modal("hide");
          // catches an event or change of data
          // calls a function for refeshing of table Signal.$on()
          Signal.$emit("AfterRequest");
          // toast alert for success message
          //user created
          Toast.fire({
            type: "success",
            title: "New Category, Successfully added"
          });
          // ends progress bar
          this.$Progress.finish();
        })
        .catch(() => {
          this.$Progress.fail();
          $("#addNew").modal("hide");
          Swal.fire("Failed !", "Something went wrong...", "warning");
          Signal.$emit("AfterRequest");
        });
    },

    // method for getting all the users
    // GET request to api/user
    fetchAllCategory: function fetchAllCategory() {
      if (this.$AuthScript.isAdminOrAuthor) {
        axios.get("api/category").then(({ data }) => {
          this.$Progress.start();
          this.tags = data.data;
          this.$Progress.finish();
        });
      }
    },

    // method for deleting a user
    // PUT|PATCH request to api/user/userid
    deleteUser: function deleteCategory(id) {
      this.$Progress.start();
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete Category !"
      }).then(result => {
        if (result.value) {
          // send delete request to controller
          this.form
            .delete("api/category/" + id)
            .then(() => {
              Swal.fire("Deleted!", "Category has been deleted.", "success");
              Signal.$emit("AfterRequest");
            })
            .catch(() => {
              Swal.fire("Failed !", "Something went wrong", "warning");
              Signal.$emit("AfterRequest");
            });
        }
      });
      this.$Progress.finish();
    },

    // open modal for form create | edit user
    addNewModal: function addNewModal() {
      this.editMode = false;
      this.form.reset();
      $("#addNew").modal("show");
    },
    editModal: function addNewModal(tag) {
      this.editMode = true;
      this.form.reset();
      $("#addNew").modal("show");
      this.form.fill(tag);
    },
    updateCategory: function updateCategory() {
      this.$Progress.start();
      if (this.form.type === 1) {
        this.form.status = 1;
      } else {
        this.form.status = 0;
      }
      this.form
        .patch("api/category/" + this.form.id)
        .then(() => {
          // success
          Swal.fire(
            "Updated!",
            "Category Information has been updated.",
            "success"
          );
          $("#addNew").modal("hide");
          Signal.$emit("AfterRequest");
          this.$Progress.finish();
        })
        .catch(() => {
          this.$Progress.fail();
          $("#addNew").modal("hide");
          Swal.fire("Failed !", "Something went wrong", "warning");
          Signal.$emit("AfterRequest");
        });
    }
  },
  // created method to load the fetchAllUsers()
  created() {
    this.fetchAllCategory();
    // signal or event gotten for table refresh Signal.$emit
    Signal.$on("AfterRequest", () => {
      this.fetchAllCategory();
    });
  }
};
</script>
