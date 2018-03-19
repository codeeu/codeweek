<!-- ================== Login & Sign Up Window ================== -->
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="tab" role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#login" role="tab" data-toggle="tab">Sign In</a></li>
                        <li role="presentation"><a href="#register" role="tab" data-toggle="tab">Sign Up</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content" id="myModalLabel2">
                        <div role="tabpanel" class="tab-pane fade in active" id="login">
                            <img src="{{asset('img/codeweek-logo.png')}}" class="img-responsive" alt="" />
                            <div class="subscribe wow fadeInUp">
                                <form class="form-inline" method="post">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="email"  name="email" class="form-control" placeholder="Username" required="">
                                            <input type="password" name="password" class="form-control"  placeholder="Password" required="">
                                            <div class="center">
                                                <button type="submit" id="login-btn" class="btn btn-midium theme-btn btn-radius width-200"> Login </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="register">
                            <img src="{{asset('img/codeweek-logo.png')}}" class="img-responsive" alt="" />
                            <form class="form-inline" method="post">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text"  name="email" class="form-control" placeholder="Your Name" required="">
                                        <input type="email"  name="email" class="form-control" placeholder="Your Email" required="">
                                        <input type="email"  name="email" class="form-control" placeholder="Username" required="">
                                        <input type="password" name="password" class="form-control"  placeholder="Password" required="">
                                        <div class="center">
                                            <button type="submit" id="subscribe" class="btn btn-midium theme-btn btn-radius width-200"> Create Account </button>
                                        </div>
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
<!-- ===================== End Login & Sign Up Window =========================== -->