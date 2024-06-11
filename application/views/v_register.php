<div id="contact" class="contact-us section" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
        <div class="row">
            <!-- <div class="col-lg-6 offset-lg-3">
                <div class="section-heading wow header-text wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                    <h6>Contact Us</h6>
                    <h4>Get In Touch With Us <em>Now</em></h4>
                    <div class="line-dec"></div>
                </div>
            </div> -->
            <div class="col-lg-12 wow header-text wow  fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
                <form id="contact" action="" method="post" action="<?= base_url('c_login/register'); ?>">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="fill-form">
                                <div class="row">
                                    <div class="col-lg-6 offset-lg-3">
                                        <img src="<?= base_url(); ?>/assets/images/unugha-logo.png" alt="">

                                    </div>



                                    <div class="col-lg-6 offset-lg-3">
                                        <br><br>
                                        <h4>Register</h4>
                                    </div>
                                    <div class="col-lg-6 offset-lg-3">
                                        <hr>
                                    </div>


                                    <div class="col-lg-6 offset-lg-3">
                                        <fieldset>
                                            <input type="text" name="id" id="id" placeholder="Employee ID number"
                                                autocomplete="off" value="<?= set_value('id'); ?>">
                                            <p><small style="color:red;"><?= form_error('id'); ?></small></p>

                                        </fieldset>
                                    </div>

                                    <div class="col-lg-3 offset-lg-3">
                                        <fieldset>
                                            <input type="text" name="username" id="username" placeholder="Username"
                                                autocomplete="off" value="<?= set_value('username'); ?>">
                                            <p><small style="color:red;"><?= form_error('username'); ?></small></p>

                                        </fieldset>
                                    </div>


                                    <div class="col-lg-3 offset-lg-0">
                                        <fieldset>
                                            <input type="text" name="email" id="email" placeholder="Email"
                                                autocomplete="off" value="<?= set_value('email'); ?>">
                                            <p><small style="color:red;"><?= form_error('email'); ?></small></p>
                                        </fieldset>
                                    </div>

                                    <div class="col-lg-6 offset-lg-3">
                                        <fieldset>
                                            <input type="text" name="name" id="name" placeholder="Name"
                                                autocomplete="off" value="<?= set_value('name'); ?>">
                                            <p><small style="color:red;"><?= form_error('name'); ?></small></p>
                                        </fieldset>
                                        <fieldset>
                                            <input
                                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                type="number" maxlength="13" name="phone" id="phone"
                                                placeholder="Phone Number" autocomplete="off"
                                                value="<?= set_value('phone'); ?>">
                                            <p><small style="color:red;"><?= form_error('phone'); ?></small></p>
                                        </fieldset>
                                        <fieldset>
                                            <textarea name="address" id="address" placeholder="Address"
                                                autocomplete="off"
                                                style="resize:none"><?= set_value('address'); ?></textarea>
                                            <p><small style="color:red;"><?= form_error('address'); ?></small></p>
                                        </fieldset>
                                    </div>

                                    <div class="col-lg-3 offset-lg-3">
                                        <fieldset>
                                            <input type="password" name="password" id="password" placeholder="Password"
                                                autocomplete="off">
                                            <p><small style="color:red;"><?= form_error('password'); ?></small></p>
                                        </fieldset>
                                    </div>

                                    <div class="col-lg-3 offset-lg-0">
                                        <fieldset>
                                            <input type="password" name="confpassword" id="confpassword"
                                                placeholder="Confirm Password" autocomplete="off">
                                            <p><small style="color:red;"><?= form_error('confpassword'); ?></small></p>
                                        </fieldset>
                                    </div>

                                    <div class="col-lg-6 offset-lg-3">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="main-button">Sign up</button>
                                        </fieldset>
                                    </div>

                                    <div class="col-lg-6 offset-lg-3">
                                        <br>
                                        <a href="<?= base_url('c_login'); ?>">I have already account</a>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>