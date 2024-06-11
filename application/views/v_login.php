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
                <form id="contact" action="<?= base_url('c_login'); ?>" method="post">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="fill-form">
                                <div class="row">
                                    <div class="col-lg-6 offset-lg-3">
                                        <img src="<?= base_url(); ?>/assets/images/unugha-logo.png" alt="">
                                    </div>

                                    <div class="col-lg-6 offset-lg-3">
                                        <br>
                                        <?= $this->session->flashdata('message'); ?>
                                    </div>

                                    <div class="col-lg-6 offset-lg-3">
                                        <fieldset>
                                            <input type="text" name="email" id="email" placeholder="Your Email" autocomplete="off" value="<?= set_value('email'); ?>">
                                            <p><small style="color:red;"><?= form_error('email'); ?></small></p>
                                        </fieldset>
                                        <fieldset>
                                            <input type="password" name="password" id="password" placeholder="Your Password" autocomplete="off">
                                            <p><small style="color:red;"><?= form_error('password'); ?></small></p>
                                        </fieldset>
                                    </div>
                                    <!-- <div class="col-lg-6 offset-lg-1" style="padding-top:20px;">
                                        <a href="#">Forgot Password?</a>
                                    </div> -->
                                    <div class="line-dec"></div>
                                    <div class="col-lg-6 offset-lg-3">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="main-button">Sign in</button>
                                        </fieldset>
                                    </div>


                                    <!-- <div class="col-lg-6 offset-lg-3">
                                        <br>
                                        <b><a href="<?= base_url('c_login/register'); ?>">Create account</a></b>
                                    </div> -->


                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>