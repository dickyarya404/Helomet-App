<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">User</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div><br>
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Edit User Data</h4>
                <br>

                <?php
                echo form_open_multipart('c_user/update/' . $row->user_id) ?>
                <div class="form-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Employee ID</label>
                                <input type="text" class="form-control" name="id" id="id" placeholder="Employee ID number" autocomplete="off" value="<?= $row->user_id ?>">
                                <p><small style="color:red;"><?= form_error('id'); ?></small></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" autocomplete="off" value="<?= $row->user_username ?>">
                                <p><small style="color:red;"><?= form_error('username'); ?></small></p>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" autocomplete="off" value="<?= $row->user_name ?>">
                                <p><small style="color:red;"><?= form_error('name'); ?></small></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email" autocomplete="off" value="<?= $row->user_email ?>">
                                <p><small style="color:red;"><?= form_error('email'); ?></small></p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gender</label><br>
                                <?php $jk = $row->user_gender ?>
                                <div class="btn-group mt-3 form-check" data-toggle="buttons" role="group">
                                    <label class="btn btn-outline btn-info">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio1" name="gender" value="1" <?php echo ($jk == '1') ? "checked" : "" ?> class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio1"> <i class="ti-check text-active" aria-hidden="true"></i>
                                                Male</label>
                                        </div>
                                    </label>
                                    <label class="btn btn-outline btn-info">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio2" name="gender" value="0" <?php echo ($jk == '0') ? "checked" : "" ?> class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio2"> <i class="ti-check text-active" aria-hidden="true"></i>
                                                Female</label>
                                        </div>
                                    </label>
                                    <label class="btn btn-outline btn-info active">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio3" name="gender" value="2" <?php echo ($jk == '2') ? "checked" : "" ?> class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio3"> <i class="ti-check text-active" aria-hidden="true"></i>
                                                N/A</label>
                                        </div>
                                    </label>
                                    <p><small style="color:red;"><?= form_error('gender'); ?></small></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="address" class="form-control" id="address" placeholder="Address" autocomplete="off" style="resize:none; height: 100px;"><?= $row->user_address ?></textarea>
                                <p><small style="color:red;"><?= form_error('address'); ?></small></p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" class="form-control" maxlength="13" name="phone" id="phone" placeholder="Phone Number" autocomplete="off" value="<?= $row->user_phonenumber ?>">
                                <p><small style="color:red;"><?= form_error('phone'); ?></small></p>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Role</label>
                                <select class="custom-select mr-sm-2" id="role" name="role">
                                    <option value="NULL">Choose Role</option>
                                    <option value="1" <?php if ($row->user_role == 1) {
                                                            echo 'selected';
                                                        } ?>>Administrator
                                    </option>
                                    <option value="2" <?php if ($row->user_role == 2) {
                                                            echo 'selected';
                                                        } ?>>Instructor
                                    </option>
                                </select>
                                <p><small style="color:red;"><?= form_error('role'); ?></small></p>

                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" value="<?= $row->user_password ?>">
                                <p><small style="color:red;"><?= form_error('password'); ?></small></p>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" name="confpassword" id="confpassword" placeholder="Confirm Password" autocomplete="off">
                                <p><small style="color:red;"><?= form_error('confpassword'); ?></small></p>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Role</label>
                                <select class="custom-select mr-sm-2" id="statusactivated" name="statusactivated">
                                    <option value="NULL">Choose Status</option>
                                    <option value="1" <?php if ($row->user_statusactivated == 1) {
                                                            echo 'selected';
                                                        } ?>>
                                        Activated</option>
                                    <option value="0" <?php if ($row->user_statusactivated == 0) {
                                                            echo 'selected';
                                                        } ?>>
                                        Not Activated</option>
                                </select>
                                <p><small style="color:red;"><?= form_error('statusactivated'); ?></small></p>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="form-actions">
                    <div class="text-right">
                        <button type="submit" class="btn btn-info">Submit</button>
                        <button type="reset" class="btn btn-dark">Reset</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>