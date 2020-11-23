
@extends('layouts.app')

@section('title', $user->name . ' 的个人中心')

@section('content')
    <section class="bg--secondary space--sm">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="boxed boxed--lg boxed--border">
                        <div class="text-block text-center">
                            <img alt="{{ $user->name }}" src="{{$user->avatar}}" class="image--sm" />
                            <span class="h4"><strong>{{$user->name}}</strong></span>
                            <span>{{$user->introduction}}</span>
                            <span class="label">个人资料</span>
                        </div>
                        <hr>
                        <div class="text-block">
                            <ul class="menu-vertical">
                                <li>
                                    <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#account-profile;hidden">编辑个人资料</a>
                                </li>
                                <li>
                                    <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#account-notifications;hidden">Email Notifications</a>
                                </li>
                                <li>
                                    <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#account-billing;hidden">Billing Details</a>
                                </li>
                                <li>
                                    <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#account-password;hidden">修改密码</a>
                                </li>
                                <li>
                                    <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#account-delete;hidden">Delete Account</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="boxed boxed--lg boxed--border">
                        <div id="account-profile" class="account-tab">
                            <h4>编辑个人资料</h4>
                            <form action="{{ route('users.update', $user->id) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">


                                <div class="row">
                                    @include('shared._error')
                                    <div class="col-md-12">
                                        <label for="name-field">用户名：</label>
                                        <input type="text" name="name" id="name-field" value="{{ old('name', $user->name) }}"  />
                                    </div>

                                    <div class="col-md-12">
                                        <label for="email-field">Email Address:</label>
                                        <input  type="text" name="email" id="email-field" value="{{ old('email', $user->email) }}" />
                                    </div>

                                    <div class="col-md-12">
                                        <label for="introduction-field">个人简介:</label>
                                        <textarea rows="4" name="introduction" id="introduction-field">{{ old('introduction', $user->introduction) }}</textarea>
                                    </div>

                                    <!--div class="col-md-12">
                                        <label>用户头像:</label>
                                        <input type="file" class="file" name="avatar" multiple  data-min-file-count="1" data-theme="fas">
                                        @if($user->avatar)
                                            <div class="boxed boxed--border">
                                                <img class="thumbnail img-responsive" src="{{ $user->avatar }}" width="200" />
                                            </div>
                                        @endif
                                    </div-->
                                    <div class="col-md-12">
                                        <label>用户头像:</label>
                                        <div class="boxed boxed--border ">

                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="max-width: 200px; max-height: 150px;">
                                                    <img src="{{ $user->avatar }}" alt=""  width="100%"/>
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                                </div>
                                                <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> 选择 </span>
                                                                <span class="fileinput-exists"> 换一个 </span>
                                                                <input type="file" name="avatar"> </span>
                                                    <a href="javascript:;" class="btn btn--secondary fileinput-exists" data-dismiss="fileinput"> 删除 </a>
                                                </div>
                                            </div>





                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4">
                                        <button type="submit" class="btn btn--primary type--uppercase">保存</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="account-notifications" class="hidden account-tab">
                            <h4>Email Notifications</h4>
                            <p>Select the frequency with which you'd like to recieve product summary emails:</p>
                            <form>
                                <div class="boxed bg--secondary boxed--border row">
                                    <div class="col-4 text-center">
                                        <div class="input-radio">
                                            <span>Never</span>
                                            <input type="radio" name="frequency" value="never" class="validate-required" />
                                            <label></label>
                                        </div>
                                    </div>
                                    <div class="col-4 text-center">
                                        <div class="input-radio checked">
                                            <span>Weekly</span>
                                            <input type="radio" name="frequency" value="weekly" class="validate-required" />
                                            <label></label>
                                        </div>
                                    </div>
                                    <div class="col-4 text-center">
                                        <div class="input-radio">
                                            <span>Monthly</span>
                                            <input type="radio" name="frequency" value="monthly" class="validate-required" />
                                            <label></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-5">
                                        <button type="submit" class="btn btn--primary type--uppercase">Save Preferences</button>
                                    </div>
                                </div>
                                <!--end of row-->
                            </form>
                        </div>
                        <div id="account-billing" class="hidden account-tab">
                            <h4>Billing Details</h4>
                            <div class="boxed boxed--border bg--secondary">
                                <h5>Payment Methods</h5>
                                <hr>
                                <form>
                                    <ul>
                                        <li class="row">
                                            <div class="col-md-6">
                                                <p>
                                                    <i class="material-icons">credit_card</i>
                                                    <span> Mastercard ending in
                                                                <strong>4722</strong>
                                                            </span>
                                                </p>
                                            </div>
                                            <div class="col-md-3 text-right text-left-xs">
                                                <button type="submit" class="btn bg--error">Remove</button>
                                            </div>
                                            <div class="col-md-3 text-right text-left-xs">
                                                <button type="submit" class="btn">Edit</button>
                                            </div>
                                        </li>
                                    </ul>
                                    <hr>
                                    <button type="submit" class="btn">Add New Method</button>
                                </form>
                            </div>
                        </div>
                        <div id="account-password" class="hidden account-tab">
                            <h4>Password</h4>
                            <p>Passwords must be at least 6 characters in length.</p>
                            <form>
                                <div class="row">
                                    <div class="col-12">
                                        <label>Old Password:</label>
                                        <input type="password" name="old-password" />
                                    </div>
                                    <div class="col-md-6">
                                        <label>New Password:</label>
                                        <input type="password" name="new-password" />
                                    </div>
                                    <div class="col-md-6">
                                        <label>Retype New Password:</label>
                                        <input type="password" name="new-password-confirm" />
                                    </div>
                                    <div class="col-lg-3 col-md-4">
                                        <button type="submit" class="btn btn--primary type--uppercase">Save Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="account-delete" class="hidden account-tab">
                            <h4>Delete Account</h4>
                            <p>Permanently remove your account using the button below. Warning, this action is permanent.</p>
                            <form>
                                <button type="submit" class="btn bg--error type--uppercase">Delete Account</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('css/bootstrap-fileinput.css')}}" />
@stop

@section('scripts')
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap-fileinput.js') }}"></script>


@stop
