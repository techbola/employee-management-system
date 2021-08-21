<template>
    <div>
        <div class="col-md-12">
            <!-- Page Heading -->
            <div
                class="d-sm-flex align-items-center justify-content-between mb-4"
            >
                <h1 class="h3 mb-0 text-gray-800">Employees</h1>
            </div>
            <div>
                <div class="alert alert-success">
                    message
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
                                    name="search"
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
                        </div>
                    </form>
                    <div>
                        <a href="#" class="btn btn-primary">Create</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Code</th>
                                <th scope="col">Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>name</td>
                                <td>code</td>
                                <td>
                                    <a href="#" class="btn btn-success">Edit</a>
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
export default {};
</script>

<style></style>
