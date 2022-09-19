<?php
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});

// Device
Breadcrumbs::for('device', function (BreadcrumbTrail $trail) {
    $trail->push('Thiết bị', route('device'));
});
// Device > Danh sách thiết bị
Breadcrumbs::for('deviceList', function (BreadcrumbTrail $trail) {
    $trail->parent('device');
    $trail->push('Danh sách thiết bị', route('device'));
});
// Device > Danh sách thiết bị > 
Breadcrumbs::for('addDevice', function (BreadcrumbTrail $trail) {
    $trail->parent('deviceList');
    $trail->push('Thêm thiết bị', route('device.add'));
});
Breadcrumbs::for('detailDevice', function (BreadcrumbTrail $trail) {
    $trail->parent('deviceList');
    $trail->push('Chi tiết thiết bị', route('device.detail'));
});
Breadcrumbs::for('updateDevice', function (BreadcrumbTrail $trail) {
    $trail->parent('deviceList');
    $trail->push('Cập nhật thiết bị', route('device.postUpdate'));
});

// Service
Breadcrumbs::for('service', function (BreadcrumbTrail $trail) {
    $trail->push('Dịch vụ ', route('service'));
});
Breadcrumbs::for('serviceList', function (BreadcrumbTrail $trail) {
    $trail->parent('service');
    $trail->push('Danh sách dịch vụ', route('service'));
}); 
Breadcrumbs::for('addService', function (BreadcrumbTrail $trail) {
    $trail->parent('serviceList');
    $trail->push('Thêm dịch vụ', route('service.add'));
});
Breadcrumbs::for('detailService', function (BreadcrumbTrail $trail) {
    $trail->parent('serviceList');
    $trail->push('Chi tiết', route('service.detail'));
});
Breadcrumbs::for('updateService', function (BreadcrumbTrail $trail) {
    $trail->parent('detailService');
    $trail->push('Cập nhật', route('service.postUpdate'));
});

//Cấp số
Breadcrumbs::for('boardcast', function (BreadcrumbTrail $trail) {
    $trail->push('Cấp số ', route('boardcast'));
});
Breadcrumbs::for('boardcastList', function (BreadcrumbTrail $trail) {
    $trail->parent('boardcast');
    $trail->push('Danh sách cấp số', route('boardcast'));
}); 
Breadcrumbs::for('addBoardCast', function (BreadcrumbTrail $trail) {
    $trail->parent('boardcastList');
    $trail->push('Cấp số mới', route('boardcast.add'));
});
Breadcrumbs::for('detailBoardCast', function (BreadcrumbTrail $trail) {
    $trail->parent('boardcastList');
    $trail->push('Chi tiết', route('boardcast.detail'));
});
Breadcrumbs::for('updateBoardCast', function (BreadcrumbTrail $trail) {
    $trail->parent('boardcastList');
    $trail->push('Cập nhật', route('boardcast.update'));
});

//Report
Breadcrumbs::for('report', function (BreadcrumbTrail $trail) {
    $trail->push('Báo cáo ', route('report'));
});
Breadcrumbs::for('reportList', function (BreadcrumbTrail $trail) {
    $trail->push('Lập báo cáo ', route('report'));
});

// Rule
Breadcrumbs::for('rule', function (BreadcrumbTrail $trail) {
    $trail->push('Cài đặt hệ thống ', route('rule'));
});
Breadcrumbs::for('ruleList', function (BreadcrumbTrail $trail) {
    $trail->parent('rule');
    $trail->push('Quản lí vai trò ', route('rule'));
});
Breadcrumbs::for('addRule', function (BreadcrumbTrail $trail) {
    $trail->parent('ruleList');
    $trail->push('Thêm vai trò', route('rule.add'));
});
Breadcrumbs::for('updateRule', function (BreadcrumbTrail $trail) {
    $trail->parent('ruleList');
    $trail->push('Cập nhật', route('rule.postUpdate'));
});
// Rule
Breadcrumbs::for('account', function (BreadcrumbTrail $trail) {
    $trail->push('Cài đặt hệ thống ', route('account'));
});
Breadcrumbs::for('accountList', function (BreadcrumbTrail $trail) {
    $trail->parent('account');
    $trail->push('Quản lí tài khoản ', route('account'));
});
Breadcrumbs::for('addAccount', function (BreadcrumbTrail $trail) {
    $trail->parent('accountList');
    $trail->push('Thêm tài khoản', route('account.add'));
});
Breadcrumbs::for('updateAccount', function (BreadcrumbTrail $trail) {
    $trail->parent('accountList');
    $trail->push('Cập nhật tài khoản', route('account.postUpdate'));
});

Breadcrumbs::for('history', function (BreadcrumbTrail $trail) {
    $trail->parent('accountList');
    $trail->push('Cài đặt hệ thống', route('history'));
});
Breadcrumbs::for('historyList', function (BreadcrumbTrail $trail) {
    $trail->parent('accountList');
    $trail->push('Nhật kí người dùng', route('history'));
});