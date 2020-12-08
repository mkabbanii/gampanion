<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <select class="searchable-field form-control">

                </select>
            </li>
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('games_and_order_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-headset">

                        </i>
                        <span>{{ trans('cruds.gamesAndOrder.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('game_access')
                            <li class="{{ request()->is("admin/games") || request()->is("admin/games/*") ? "active" : "" }}">
                                <a href="{{ route("admin.games.index") }}">
                                    <i class="fa-fw fas fa-gamepad">

                                    </i>
                                    <span>{{ trans('cruds.game.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('order_access')
                            <li class="{{ request()->is("admin/orders") || request()->is("admin/orders/*") ? "active" : "" }}">
                                <a href="{{ route("admin.orders.index") }}">
                                    <i class="fa-fw fas fa-copy">

                                    </i>
                                    <span>{{ trans('cruds.order.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('gampanion_access')
                            <li class="{{ request()->is("admin/gampanions") || request()->is("admin/gampanions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.gampanions.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.gampanion.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('system_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.systemManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('user_alert_access')
                            <li class="{{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "active" : "" }}">
                                <a href="{{ route("admin.user-alerts.index") }}">
                                    <i class="fa-fw fas fa-bell">

                                    </i>
                                    <span>{{ trans('cruds.userAlert.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('review_access')
                            <li class="{{ request()->is("admin/reviews") || request()->is("admin/reviews/*") ? "active" : "" }}">
                                <a href="{{ route("admin.reviews.index") }}">
                                    <i class="fa-fw fas fa-thumbs-up">

                                    </i>
                                    <span>{{ trans('cruds.review.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('favorite_access')
                            <li class="{{ request()->is("admin/favorites") || request()->is("admin/favorites/*") ? "active" : "" }}">
                                <a href="{{ route("admin.favorites.index") }}">
                                    <i class="fa-fw fab fa-gratipay">

                                    </i>
                                    <span>{{ trans('cruds.favorite.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('coupon_access')
                            <li class="{{ request()->is("admin/coupons") || request()->is("admin/coupons/*") ? "active" : "" }}">
                                <a href="{{ route("admin.coupons.index") }}">
                                    <i class="fa-fw far fa-money-bill-alt">

                                    </i>
                                    <span>{{ trans('cruds.coupon.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('redemption_access')
                            <li class="{{ request()->is("admin/redemptions") || request()->is("admin/redemptions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.redemptions.index") }}">
                                    <i class="fa-fw fas fa-strikethrough">

                                    </i>
                                    <span>{{ trans('cruds.redemption.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('announcement_access')
                            <li class="{{ request()->is("admin/announcements") || request()->is("admin/announcements/*") ? "active" : "" }}">
                                <a href="{{ route("admin.announcements.index") }}">
                                    <i class="fa-fw fas fa-bullhorn">

                                    </i>
                                    <span>{{ trans('cruds.announcement.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('message_access')
                            <li class="{{ request()->is("admin/messages") || request()->is("admin/messages/*") ? "active" : "" }}">
                                <a href="{{ route("admin.messages.index") }}">
                                    <i class="fa-fw far fa-comments">

                                    </i>
                                    <span>{{ trans('cruds.message.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('banner_access')
                            <li class="{{ request()->is("admin/banners") || request()->is("admin/banners/*") ? "active" : "" }}">
                                <a href="{{ route("admin.banners.index") }}">
                                    <i class="fa-fw fab fa-slideshare">

                                    </i>
                                    <span>{{ trans('cruds.banner.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('money_matter_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-dollar-sign">

                        </i>
                        <span>{{ trans('cruds.moneyMatter.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('wallet_access')
                            <li class="{{ request()->is("admin/wallets") || request()->is("admin/wallets/*") ? "active" : "" }}">
                                <a href="{{ route("admin.wallets.index") }}">
                                    <i class="fa-fw fas fa-wallet">

                                    </i>
                                    <span>{{ trans('cruds.wallet.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('payment_access')
                            <li class="{{ request()->is("admin/payments") || request()->is("admin/payments/*") ? "active" : "" }}">
                                <a href="{{ route("admin.payments.index") }}">
                                    <i class="fa-fw far fa-money-bill-alt">

                                    </i>
                                    <span>{{ trans('cruds.payment.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('withdraw_access')
                            <li class="{{ request()->is("admin/withdraws") || request()->is("admin/withdraws/*") ? "active" : "" }}">
                                <a href="{{ route("admin.withdraws.index") }}">
                                    <i class="fa-fw fas fa-money-bill-wave">

                                    </i>
                                    <span>{{ trans('cruds.withdraw.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('audit_log_access')
                            <li class="{{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                <a href="{{ route("admin.audit-logs.index") }}">
                                    <i class="fa-fw fas fa-file-alt">

                                    </i>
                                    <span>{{ trans('cruds.auditLog.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('system_setting_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.systemSetting.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('status_access')
                            <li class="{{ request()->is("admin/statuses") || request()->is("admin/statuses/*") ? "active" : "" }}">
                                <a href="{{ route("admin.statuses.index") }}">
                                    <i class="fa-fw fas fa-tasks">

                                    </i>
                                    <span>{{ trans('cruds.status.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('payment_method_access')
                            <li class="{{ request()->is("admin/payment-methods") || request()->is("admin/payment-methods/*") ? "active" : "" }}">
                                <a href="{{ route("admin.payment-methods.index") }}">
                                    <i class="fa-fw fas fa-credit-card">

                                    </i>
                                    <span>{{ trans('cruds.paymentMethod.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('system_string_access')
                            <li class="{{ request()->is("admin/system-strings") || request()->is("admin/system-strings/*") ? "active" : "" }}">
                                <a href="{{ route("admin.system-strings.index") }}">
                                    <i class="fa-fw fas fa-cog">

                                    </i>
                                    <span>{{ trans('cruds.systemString.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="{{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}">
                        <a href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>
    </section>
</aside>