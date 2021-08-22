<template>
    <div class="col-md-12">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Employees</h1>
        </div>
        <div class="card">
            <div class="card-header">
                Create New Employee
                <router-link
                    :to="{ name: 'EmployeesIndex' }"
                    class="btn btn-primary float-right"
                    >Back</router-link
                >
            </div>
            <div class="card-body">
                <form @submit.prevent="storeEmployee">
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right"
                            >First Name</label
                        >

                        <div class="col-md-6">
                            <input
                                type="text"
                                class="form-control"
                                v-model="form.first_name"
                                required
                                autofocus
                            />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right"
                            >Middle Name</label
                        >

                        <div class="col-md-6">
                            <input
                                type="text"
                                class="form-control"
                                v-model="form.middle_name"
                                required
                                autofocus
                            />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right"
                            >Last Name</label
                        >

                        <div class="col-md-6">
                            <input
                                type="text"
                                class="form-control"
                                v-model="form.last_name"
                                required
                                autofocus
                            />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right"
                            >Address</label
                        >

                        <div class="col-md-6">
                            <input
                                type="text"
                                class="form-control"
                                v-model="form.address"
                                required
                                autofocus
                            />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right"
                            >Country</label
                        >

                        <div class="col-md-6">
                            <select
                                v-model="form.country_id"
                                class="custom-select"
                                required
                                @change="getStates()"
                            >
                                <option
                                    v-for="country in countries"
                                    :key="country.id"
                                    :value="country.id"
                                    >{{ country.name }}</option
                                >
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right"
                            >State</label
                        >

                        <div class="col-md-6">
                            <select
                                v-model="form.state_id"
                                class="custom-select"
                                required
                                @change="getCities()"
                            >
                                <option
                                    v-for="state in states"
                                    :key="state.id"
                                    :value="state.id"
                                    >{{ state.name }}</option
                                >
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right"
                            >City</label
                        >

                        <div class="col-md-6">
                            <select
                                v-model="form.city_id"
                                class="custom-select"
                                required
                            >
                                <option
                                    v-for="city in cities"
                                    :key="city.id"
                                    :value="city.id"
                                    >{{ city.name }}</option
                                >
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right"
                            >Department</label
                        >

                        <div class="col-md-6">
                            <select
                                v-model="form.department_id"
                                class="custom-select"
                                required
                            >
                                <option
                                    v-for="department in departments"
                                    :key="department.id"
                                    :value="department.id"
                                    >{{ department.name }}</option
                                >
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right"
                            >Zip Code</label
                        >

                        <div class="col-md-6">
                            <input
                                type="text"
                                class="form-control"
                                v-model="form.zip_code"
                                required
                                autofocus
                            />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right"
                            >Birthday</label
                        >
                        <div class="col-md-6">
                            <datepicker
                                input-class="form-control"
                                v-model="form.birthdate"
                            ></datepicker>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right"
                            >Date Hired</label
                        >
                        <div class="col-md-6">
                            <datepicker
                                input-class="form-control"
                                v-model="form.date_hired"
                            ></datepicker>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Create
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import Datepicker from "vuejs-datepicker";
import moment from "moment";

export default {
    components: {
        Datepicker
    },
    data() {
        return {
            countries: [],
            states: [],
            cities: [],
            departments: [],
            form: {
                first_name: "",
                last_name: "",
                middle_name: "",
                address: "",
                country_id: "",
                state_id: "",
                city_id: "",
                zip_code: "",
                department_id: "",
                birthdate: null,
                date_hired: null
            }
        };
    },
    created() {
        this.getCountries();
        this.getDepartments();
    },
    methods: {
        getCountries() {
            axios
                .get("/api/employees/countries")
                .then(results => {
                    this.countries = results.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        getStates() {
            axios
                .get(`/api/employees/${this.form.country_id}/states`)
                .then(results => {
                    this.states = results.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        getCities() {
            axios
                .get(`/api/employees/${this.form.state_id}/cities`)
                .then(results => {
                    this.cities = results.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
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
        storeEmployee() {
            console.log("here");
            axios
                .post("/api/employees", {
                    first_name: this.form.first_name,
                    last_name: this.form.last_name,
                    middle_name: this.form.middle_name,
                    address: this.form.address,
                    country_id: this.form.country_id,
                    state_id: this.form.state_id,
                    city_id: this.form.city_id,
                    zip_code: this.form.zip_code,
                    department_id: this.form.department_id,
                    birthdate: this.format_date(this.form.birthdate),
                    date_hired: this.format_date(this.form.date_hired)
                })
                .then(result => {
                    console.log("registered");
                })
                .catch(error => {
                    console.log(error);
                });
        },
        format_date(value) {
            if (value) {
                return moment(String(value)).format("YYYYMMDD");
            }
        }
    }
};
</script>

<style></style>
