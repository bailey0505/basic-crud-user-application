<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 container"> 
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <button class="btn btn-primary" id="add_user_button">Add User</button>
                    </div>
                    <div class="card-body">
                        <table id="users_table" class="display table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Employee Id</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->name }}</td>
                                        <td>{{ $employee->email }}</td>
                                        <td>{{ $employee->employee_id }}</td>
                                        <td><a href="" class="edit_employee" data-id="{{ $employee->id }}" data-name="{{ $employee->name }}" data-email="{{ $employee->email }}" data-employeeid="{{ $employee->employee_id }}">Edit</a> </td>
                                        <td><a style="color: red !important;" href="" class="delete_employee" data-id="{{ $employee->id }}">Delete</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add_user_modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="add-user-form">
                    <div class="modal-header">
                        <h5 class="modal-title">Add User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label" for="name">Name</label>
                                    <input class="form-control" type="text" name="name" placeholder="John Doe" required />
                                </div>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="email">Email</label>
                                    <input class="form-control" type="email" name="email" placeholder="example@example.com" required />
                                </div>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="employee_id">Emploee Id</label>
                                    <input class="form-control" type="text" name="employee_id" placeholder="XY-1234" maxlength="7" required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" value="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit_user_modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="edit-user-form">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label" for="name">Name</label>
                                    <input class="form-control" type="text" name="name" placeholder="John Doe" required />
                                </div>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="email">Email</label>
                                    <input class="form-control" type="email" name="email" placeholder="example@example.com" required />
                                </div>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="employee_id">Emploee Id</label>
                                    <input class="form-control" type="text" name="employee_id" placeholder="XY-1234" maxlength="7" required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input class="form-control" type="hidden" name="id"  />
                        <button type="submit" value="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
