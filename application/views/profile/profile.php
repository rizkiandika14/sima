<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">

            <div class="col-xs-12 col-sm-9">
                <div class="card">
                    <div class="body">
                        <div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab"
                                        data-toggle="tab">Home</a></li>
                                <li role="presentation"><a href="#profile_settings" aria-controls="settings" role="tab"
                                        data-toggle="tab">Profile Settings</a></li>
                                <li role="presentation"><a href="#change_password_settings" aria-controls="settings"
                                        role="tab" data-toggle="tab">Change Password</a></li>
                            </ul>

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="home">
                                    <div class="panel panel-default panel-post">
                                        <div class="panel-heading">
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img src="<?= base_url('assets/'); ?>images/user.png" />
                                                    </a>
                                                </div>

                                                <div class="media-body">
                                                    <h4 class="media-heading">
                                                        <a href="#"><?= $this->session->userdata('username'); ?></a>
                                                    </h4>
                                                    <?= $this->session->userdata('email'); ?>

                                                    <li>Divisi : <a><?= $user['divisi']; ?></a></li>
                                                    <li>Contact : <a><?= $user['contact']; ?></a></li>

                                                </div>

                                            </div>
                                        </div>

                                    </div>


                                </div>
                                <div role="tabpanel" class="tab-pane fade in" id="profile_settings">
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label for="NameSurname" class="col-sm-2 control-label">Name Surname</label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="NameSurname"
                                                        name="NameSurname" placeholder="Name Surname"
                                                        value="Marc K. Hammond" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Email" class="col-sm-2 control-label">Email</label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="email" class="form-control" id="Email" name="Email"
                                                        placeholder="Email" value="example@example.com" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="InputExperience"
                                                class="col-sm-2 control-label">Experience</label>

                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <textarea class="form-control" id="InputExperience"
                                                        name="InputExperience" rows="3"
                                                        placeholder="Experience"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="InputSkills" class="col-sm-2 control-label">Skills</label>

                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="InputSkills"
                                                        name="InputSkills" placeholder="Skills">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">SUBMIT</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label for="OldPassword" class="col-sm-3 control-label">Old Password</label>
                                            <div class="col-sm-9">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" id="OldPassword"
                                                        name="OldPassword" placeholder="Old Password" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="NewPassword" class="col-sm-3 control-label">New Password</label>
                                            <div class="col-sm-9">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" id="NewPassword"
                                                        name="NewPassword" placeholder="New Password" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="NewPasswordConfirm" class="col-sm-3 control-label">New Password
                                                (Confirm)</label>
                                            <div class="col-sm-9">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" id="NewPasswordConfirm"
                                                        name="NewPasswordConfirm" placeholder="New Password (Confirm)"
                                                        required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button type="submit" class="btn btn-danger">SUBMIT</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>