<template>
  <div>
    <div class="col-md-12">
      <!-- Page Heading -->
      <div
        class="d-sm-flex align-items-center justify-content-between mb-4"
      >
        <h1 class="h3 mb-0 text-gray-800">Employees</h1>
      </div>
      <div v-if="showMessage">
        <div class="alert alert-success">
          {{ message }}
        </div>
      </div>
      <div class="card">
        <div
          class="card-header d-flex justify-content-between align-items-center"
        >
          <form>
            <div class="form-row align-items-center">
              <div class="col-auto">
                <input
                  type="text"
                  v-model.lazy="search"
                  class="form-control mb-2"
                  placeholder="Search"
                />
              </div>
              <div class="col-auto">
                <button
                  type="submit"
                  class="btn btn-primary mb-2"
                >
                  Search
                </button>
              </div>
              <div class="col-auto">
                <select
                  v-model="selectedDepartment"
                  class="custom-select mb-2"
                >
                  <option
                    v-for="department in departments"
                    :key="department.id"
                    :value="department.id"
                  >{{ department.name }}
                  </option
                  >
                </select>
              </div>
            </div>
          </form>
          <div>
            <router-link
              :to="{ name: 'EmployeesCreate' }"
              class="btn btn-primary"
            >Create
            </router-link
            >
          </div>
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Address</th>
              <th scope="col">Department</th>
              <th scope="col">Manage</th>
            </tr>
            </thead>
            <tbody>
            <tr
              v-for="employee in employees"
              :key="employee.id"
            >
              <th scope="row">{{ employee.id }}</th>
              <td>{{ employee.first_name }}</td>
              <td>{{ employee.last_name }}</td>
              <td>{{ employee.address }}</td>
              <td>{{ employee.department.name }}</td>
              <td>
                <router-link
                  :to="{ name: 'EmployeesEdit', params: { id: employee.id } }"
                  class="btn btn-success"
                >Edit
                </router-link
                >
                <button
                  class="btn btn-danger"
                  @click="deleteEmployee(employee.id)"
                >
                  Delete
                </button>
              </td>
            </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      employees: [],
      showMessage: false,
      message: "",
      search: "",
      departments: [],
      selectedDepartment: null
    };
  },
  created() {
    this.getEmployees();
    this.getDepartments()
  },
  watch: {
    search() {
      this.getEmployees()
    },
    selectedDepartment() {
      this.getEmployees()
    }
  },
  methods: {
    getDepartments() {
      axios
        .get("/api/employees/departments")
        .then(results => {
          this.departments = results.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    getEmployees() {
      let params = {
        search: this.search,
        department_id: this.selectedDepartment
      }
      axios
        .get("api/employees", { params: params })
        .then(results => {
          this.employees = results.data.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    deleteEmployee(id) {
      axios
        .delete(`api/employees/${id}`)
        .then(result => {
          console.log(result);
          this.showMessage = true;
          this.message = result.data;
          this.getEmployees();
        })
        .catch(error => {
          console.log(error);
        });
    }
  }
};
</script>

<style></style>
